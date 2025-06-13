<?php
// app/Services/NksApiService.php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NksApiService
{
    protected $baseUrl;
    protected $timeout;

    public function __construct()
    {
        $this->baseUrl = 'https://online.nks.vn/api/nks';
        $this->timeout = 30;
    }

    /**
     * Get all blog posts for listing page
     */
    public function getInsights()
    {
        $cacheKey = 'nks_insights_' . date('Y-m-d-H');

        // Try cache first
        $cachedData = Cache::get($cacheKey);
        if ($cachedData) {
            Log::info('Returning cached insights data', ['count' => count($cachedData['data'] ?? [])]);
            return $cachedData;
        }

        Log::info('Fetching insights from API');

        try {
            $client = new Client(['timeout' => $this->timeout]);

            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];

            $request = new Request('POST', $this->baseUrl . '/insights', $headers);
            $response = $client->sendAsync($request)->wait();

            $statusCode = $response->getStatusCode();
            $rawBody = $response->getBody()->getContents();

            Log::info('Insights API response', [
                'status_code' => $statusCode,
                'content_length' => strlen($rawBody)
            ]);

            if ($statusCode !== 200) {
                throw new \Exception("HTTP {$statusCode}: Insights API request failed");
            }

            $data = json_decode($rawBody, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON response: ' . json_last_error_msg());
            }

            // Validate response structure
            if (!is_array($data) || !isset($data['data']) || !is_array($data['data'])) {
                Log::warning('Invalid insights API response structure');
                return $this->getFallbackData();
            }

            // Process posts - only add slug if missing
            foreach ($data['data'] as $index => &$post) {
                if (!isset($post['slug']) || empty($post['slug'])) {
                    $post['slug'] = Str::slug($post['title'] ?? 'untitled') . '-' . time() . '-' . $index;
                }

                // Add read time if missing
                if (!isset($post['readTime'])) {
                    $post['readTime'] = $this->estimateReadTime($post['excerpt'] ?? '');
                }
            }
            unset($post); // Break reference

            Log::info('Insights processing successful', [
                'posts_processed' => count($data['data'])
            ]);

            // Cache successful response
            Cache::put($cacheKey, $data, 3600);

            // Store as fallback cache too
            Cache::put('nks_insights_fallback', $data, 86400 * 7); // 7 days

            return $data;
        } catch (\Throwable $e) {
            Log::error('Insights API Service Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'class' => get_class($e)
            ]);

            return $this->getFallbackData();
        }
    }

    /**
     * ✅ FIXED - Get single blog post detail by slug with robust fallback
     */
    public function getInsight($slug)
    {
        $cacheKey = 'nks_insight_' . md5($slug);

        // Try cache first
        $cachedData = Cache::get($cacheKey);
        if ($cachedData) {
            Log::info('Returning cached insight data', ['slug' => $slug]);
            return $cachedData;
        }

        Log::info('Fetching insight from API', ['slug' => $slug]);

        // ✅ TRY MULTIPLE METHODS TO GET INSIGHT
        $methods = [
            'guzzle_multipart',
            'guzzle_form_params',
            'curl_fallback'
        ];

        foreach ($methods as $method) {
            try {
                Log::info("Trying method: {$method}", ['slug' => $slug]);

                $result = $this->tryInsightMethod($method, $slug);

                if ($result !== null) {
                    Log::info("Success with method: {$method}", ['slug' => $slug]);

                    // Cache successful response
                    Cache::put($cacheKey, $result, 3600);
                    return $result;
                }
            } catch (\Exception $e) {
                Log::warning("Method {$method} failed", [
                    'slug' => $slug,
                    'error' => $e->getMessage()
                ]);
                continue;
            }
        }

        // ✅ ALL METHODS FAILED - Use insights list fallback
        Log::warning('All insight methods failed, using insights list fallback', ['slug' => $slug]);
        return $this->getPostFromInsightsList($slug);
    }

    /**
     * ✅ NEW - Try different methods to get insight
     */
    private function tryInsightMethod($method, $slug)
    {
        switch ($method) {
            case 'guzzle_multipart':
                return $this->getInsightViaGuzzleMultipart($slug);

            case 'guzzle_form_params':
                return $this->getInsightViaGuzzleForm($slug);

            case 'curl_fallback':
                return $this->getInsightViaCurl($slug);

            default:
                return null;
        }
    }

    /**
     * ✅ Method 1: Guzzle with multipart (original method)
     */
    private function getInsightViaGuzzleMultipart($slug)
    {
        $client = new Client([
            'timeout' => $this->timeout,
            'http_errors' => false,
            'verify' => false
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ];

        $options = [
            'multipart' => [
                [
                    'name' => 'slug',
                    'contents' => $slug
                ]
            ]
        ];

        $request = new Request('POST', $this->baseUrl . '/insight', $headers);
        $response = $client->sendAsync($request, $options)->wait();

        return $this->processInsightResponse($response, $slug, 'guzzle_multipart');
    }

    /**
     * ✅ Method 2: Guzzle with form params
     */
    private function getInsightViaGuzzleForm($slug)
    {
        $client = new Client([
            'timeout' => $this->timeout,
            'http_errors' => false,
            'verify' => false
        ]);

        $response = $client->post($this->baseUrl . '/insight', [
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'PostmanRuntime/7.32.2'
            ],
            'form_params' => [
                'slug' => $slug
            ]
        ]);

        return $this->processInsightResponse($response, $slug, 'guzzle_form');
    }

    /**
     * ✅ Method 3: cURL fallback
     */
    private function getInsightViaCurl($slug)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $this->baseUrl . '/insight',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query(['slug' => $slug]),
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'User-Agent: PostmanRuntime/7.32.2',
                'Content-Type: application/x-www-form-urlencoded'
            ],
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            throw new \Exception("cURL error: {$error}");
        }

        if ($httpCode !== 200) {
            Log::error('cURL HTTP error', [
                'slug' => $slug,
                'http_code' => $httpCode,
                'response' => substr($response, 0, 500)
            ]);
            return null;
        }

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('JSON decode error: ' . json_last_error_msg());
        }

        if (isset($data['data'])) {
            $data['data'] = $this->processInsightData($data['data'], $slug);
        }

        return $data;
    }

    /**
     * ✅ Process insight response from any method
     */
    private function processInsightResponse($response, $slug, $method)
    {
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody()->getContents();

        Log::info("Insight API response via {$method}", [
            'slug' => $slug,
            'status_code' => $statusCode,
            'content_length' => strlen($responseBody)
        ]);

        if ($statusCode !== 200) {
            Log::error("HTTP Error from Insight API via {$method}", [
                'slug' => $slug,
                'status_code' => $statusCode,
                'response' => substr($responseBody, 0, 500)
            ]);
            return null;
        }

        $data = json_decode($responseBody, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error("JSON Parse Error for insight via {$method}", [
                'slug' => $slug,
                'json_error' => json_last_error_msg(),
                'response_preview' => substr($responseBody, 0, 500)
            ]);
            return null;
        }

        Log::info("Insight JSON parsed successfully via {$method}", [
            'slug' => $slug,
            'success' => $data['success'] ?? 'not set',
            'has_data' => isset($data['data'])
        ]);

        // Process insight data
        if (isset($data['data'])) {
            $data['data'] = $this->processInsightData($data['data'], $slug);
        }

        return $data;
    }

    /**
     * ✅ ENHANCED - Get post from insights list as fallback
     */
    private function getPostFromInsightsList($slug)
    {
        Log::info('Using insights list fallback for slug', ['slug' => $slug]);

        try {
            $insightsResponse = $this->getInsights();

            if (!$insightsResponse || !isset($insightsResponse['data'])) {
                Log::error('Insights list also failed');
                return null;
            }

            // Try exact match first
            $post = collect($insightsResponse['data'])->firstWhere('slug', $slug);

            if (!$post) {
                Log::warning('Exact match not found, trying partial match', ['slug' => $slug]);

                // Try partial match
                $slugParts = explode('-', $slug);
                $firstPart = $slugParts[0] ?? '';

                if (strlen($firstPart) > 3) {
                    $post = collect($insightsResponse['data'])->first(function ($p) use ($firstPart) {
                        return str_contains($p['slug'], $firstPart);
                    });
                }
            }

            if (!$post) {
                Log::warning('No post found in insights list', ['slug' => $slug]);
                return null;
            }

            // ✅ Enhance post for detail view
            $enhancedPost = $this->enhancePostForDetail($post);

            $fallbackResponse = [
                'success' => true,
                'data' => $enhancedPost,
                'source' => 'insights_list_fallback'
            ];

            // Cache fallback response
            $cacheKey = 'nks_insight_' . md5($slug);
            Cache::put($cacheKey, $fallbackResponse, 1800); // 30 minutes

            Log::info('Created fallback response from insights list', [
                'slug' => $slug,
                'found_slug' => $enhancedPost['slug'],
                'title' => $enhancedPost['title']
            ]);

            return $fallbackResponse;
        } catch (\Exception $e) {
            Log::error('Fallback to insights list failed', [
                'slug' => $slug,
                'error' => $e->getMessage()
            ]);

            return null;
        }
    }

    /**
     * ✅ ENHANCED - Improve post data for detail view
     */
    private function enhancePostForDetail($post)
    {
        // ✅ Try to get more content
        $post['body'] = $post['excerpt'] ?? '';

        // ✅ Generate additional content if excerpt is short
        if (strlen($post['body']) < 500) {
            $additionalContent = $this->generateAdditionalContent($post);
            if ($additionalContent) {
                $post['body'] .= "\n\n" . $additionalContent;
            }
        }

        // ✅ Ensure all required fields exist
        $post['title'] = $post['title'] ?? 'Untitled';
        $post['slug'] = $post['slug'] ?? Str::slug($post['title']);
        $post['image'] = $post['image'] ?? asset('images/default-blog.jpg');
        $post['postCategory'] = $post['postCategory'] ?? 'General';
        $post['author'] = $post['author'] ?? ['name' => 'Admin'];
        $post['formatedDate'] = $post['formatedDate'] ?? date('d/m/Y');
        $post['readTime'] = $this->estimateReadTime($post['body']);
        $post['view'] = $post['view'] ?? 0;
        $post['tags'] = $post['tags'] ?? [$post['postCategory']];

        return $post;
    }

    /**
     * ✅ Generate additional content for better UX
     */
    private function generateAdditionalContent($post)
    {
        $category = $post['postCategory'] ?? 'General';
        $title = $post['title'] ?? '';

        $templates = [
            'Tiền điện tử' => "<h3>Về {$title}</h3><p>Bài viết này cung cấp thông tin chi tiết về {$title}. Trong thế giới tiền điện tử đang phát triển nhanh chóng, việc hiểu rõ các khái niệm và xu hướng mới là rất quan trọng để đưa ra quyết định đầu tư thông minh.</p><p>Tiền điện tử không chỉ là một công nghệ mới mà còn là một cuộc cách mạng tài chính đang thay đổi cách chúng ta nghĩ về tiền tệ và giao dịch.</p>",

            'Công nghệ' => "<h3>Khám phá {$title}</h3><p>Khám phá sâu hơn về {$title} trong bối cảnh công nghệ hiện đại. Những tiến bộ công nghệ này đang định hình lại cách chúng ta làm việc, giao tiếp và sống.</p><p>Việc theo kịp các xu hướng công nghệ mới là điều cần thiết trong thời đại số hóa hiện tại.</p>",

            'Thiết kế web' => "<h3>Ứng dụng {$title}</h3><p>Tìm hiểu về {$title} và cách áp dụng vào dự án thiết kế web của bạn. Những xu hướng thiết kế mới này sẽ giúp tạo ra trải nghiệm người dùng tốt hơn và trang web hiện đại hơn.</p><p>Thiết kế web không chỉ về giao diện đẹp mà còn về trải nghiệm người dùng và hiệu suất.</p>",

            'Default' => "<h3>Thông tin về {$title}</h3><p>Bài viết này khám phá {$title} một cách toàn diện. Nội dung được biên soạn kỹ lưỡng để cung cấp thông tin hữu ích và cập nhật nhất cho người đọc.</p><p>Chúng tôi hy vọng thông tin này sẽ hữu ích cho bạn trong việc tìm hiểu thêm về chủ đề này.</p>"
        ];

        return $templates[$category] ?? $templates['Default'];
    }


    private function cleanHtmlContent($content)
    {
        if (empty($content)) {
            return $content;
        }

        // Decode HTML entities
        $content = html_entity_decode($content, ENT_QUOTES, 'UTF-8');

        // Clean up common issues
        $content = str_replace([
            '&nbsp;&nbsp;&nbsp;',
            '&nbsp;&nbsp;',
            '&nbsp;'
        ], [
            ' ',
            ' ',
            ' '
        ], $content);

        // Fix Vietnamese characters if still encoded
        $content = str_replace([
            '&agrave;',
            '&aacute;',
            '&atilde;',
            '&acirc;',
            '&egrave;',
            '&eacute;',
            '&ecirc;',
            '&igrave;',
            '&iacute;',
            '&icirc;',
            '&ograve;',
            '&oacute;',
            '&otilde;',
            '&ocirc;',
            '&ocirc;',
            '&ugrave;',
            '&uacute;',
            '&ucirc;',
            '&ygrave;',
            '&yacute;'
        ], [
            'à',
            'á',
            'ã',
            'â',
            'è',
            'é',
            'ê',
            'ì',
            'í',
            'î',
            'ò',
            'ó',
            'õ',
            'ô',
            'ô',
            'ù',
            'ú',
            'û',
            'ỳ',
            'ý'
        ], $content);

        return $content;
    }

    /**
     * ✅ ENHANCED - Process insight data with multiple content field handling
     */
    private function processInsightData($insight, $slug = null)
    {
        if (!is_array($insight)) {
            return $insight;
        }

        Log::info('Processing insight data', [
            'slug' => $slug,
            'available_fields' => array_keys($insight)
        ]);

        // Ensure slug exists
        if (!isset($insight['slug']) || empty($insight['slug'])) {
            $insight['slug'] = Str::slug($insight['title'] ?? 'untitled') . '-' . time();
        }

        // Set defaults for missing fields
        $insight['title'] = $insight['title'] ?? 'Untitled';
        $insight['excerpt'] = $insight['excerpt'] ?? $insight['description'] ?? '';

        // ✅ Try multiple content field variations from API
        $contentFields = [
            'body',
            'content',
            'full_content',
            'post_content',
            'description',
            'long_description',
            'details',
            'html_content',
            'rich_content'
        ];

        $fullContent = '';
        $foundField = null;

        foreach ($contentFields as $field) {
            if (isset($insight[$field]) && !empty($insight[$field]) && strlen($insight[$field]) > 100) {
                $fullContent = $this->cleanHtmlContent($insight[$field]);
                $foundField = $field;
                break;
            }
        }

        // ✅ Set body content with enhanced logic
        if (!empty($fullContent) && strlen($fullContent) > 100) {
            $insight['body'] = $fullContent;
            Log::info('Using full content as body', [
                'slug' => $slug,
                'source' => $foundField,
                'length' => strlen($fullContent)
            ]);
        } else {
            // ✅ Enhanced excerpt handling when no full content
            $insight['body'] = $this->cleanHtmlContent($insight['excerpt'] ?? '');
            Log::warning('Using excerpt as body content - limited content available', [
                'slug' => $slug,
                'excerpt_length' => strlen($insight['body'])
            ]);
        }

        // ✅ Set other fields
        $insight['image'] = $insight['image'] ?? asset('images/default-blog.jpg');
        $insight['postCategory'] = $insight['postCategory'] ?? $insight['category'] ?? 'General';

        // Handle author
        if (!isset($insight['author']) || !is_array($insight['author'])) {
            $insight['author'] = ['name' => $insight['author_name'] ?? 'Admin'];
        }

        $insight['formatedDate'] = $insight['formatedDate'] ?? $insight['created_at'] ?? date('d/m/Y');

        // ✅ Calculate read time from best available content
        $contentForReadTime = $insight['body'] ?? $insight['excerpt'] ?? '';
        $insight['readTime'] = $this->estimateReadTime($contentForReadTime);
        $insight['view'] = $insight['view'] ?? $insight['views'] ?? 0;

        // Handle tags
        if (isset($insight['tags']) && is_string($insight['tags'])) {
            $insight['tags'] = array_map('trim', explode(',', $insight['tags']));
        } elseif (!isset($insight['tags'])) {
            $insight['tags'] = [$insight['postCategory']];
        }

        Log::info('Insight processing completed', [
            'slug' => $slug,
            'final_body_length' => strlen($insight['body']),
            'final_excerpt_length' => strlen($insight['excerpt']),
            'read_time' => $insight['readTime']
        ]);

        return $insight;
    }

    /**
     * Estimate reading time based on content
     */
    private function estimateReadTime($text)
    {
        $wordCount = str_word_count(strip_tags($text));
        $minutes = ceil($wordCount / 200); // Average reading speed: 200 words per minute
        return max(1, $minutes);
    }

    /**
     * Get fallback data when API fails
     */
    private function getFallbackData()
    {
        // Try longer cache first
        $fallbackData = Cache::get('nks_insights_fallback');
        if ($fallbackData && isset($fallbackData['data']) && count($fallbackData['data']) > 1) {
            Log::info('Using cached fallback data', ['count' => count($fallbackData['data'])]);
            return $fallbackData;
        }

        Log::warning('Using hardcoded fallback data');

        return [
            'success' => true,
            'data' => [
                [
                    'title' => 'Hệ thống Blog đang tải',
                    'slug' => 'blog-system-loading-' . time(),
                    'excerpt' => 'Hệ thống blog đang tải nội dung từ API. Vui lòng thử lại sau ít phút.',
                    'body' => '<h3>Hệ thống đang tải</h3><p>Hệ thống blog đang tải nội dung từ API NKS. Vui lòng thử lại sau ít phút để xem các bài viết mới nhất.</p><p>Cảm ơn bạn đã kiên nhẫn chờ đợi.</p>',
                    'image' => asset('images/default-blog.jpg'),
                    'postCategory' => 'Hệ thống',
                    'author' => ['name' => 'Quản trị viên'],
                    'formatedDate' => date('d/m/Y'),
                    'readTime' => 1,
                    'view' => 0,
                    'tags' => ['Hệ thống']
                ]
            ]
        ];
    }

    /**
     * Clear all cache entries
     */
    public function clearCache()
    {
        $patterns = [
            'nks_insights_' . date('Y-m-d-H'),
            'nks_insights_fallback'
        ];

        foreach ($patterns as $pattern) {
            Cache::forget($pattern);
        }

        // Clear insight cache entries safely
        try {
            if (Cache::getStore() instanceof \Illuminate\Cache\RedisStore) {
                $insightKeys = Cache::getRedis()->keys('*nks_insight_*');
                foreach ($insightKeys as $key) {
                    Cache::forget(str_replace(config('cache.prefix') . ':', '', $key));
                }
            }
        } catch (\Exception $e) {
            Log::warning('Could not clear insight cache keys', ['error' => $e->getMessage()]);
        }

        Log::info('NKS API cache cleared');
    }

    /**
     * Get cache statistics
     */
    public function getCacheStats()
    {
        $insightsKey = 'nks_insights_' . date('Y-m-d-H');
        $fallbackKey = 'nks_insights_fallback';

        return [
            'insights_cached' => Cache::has($insightsKey),
            'fallback_cached' => Cache::has($fallbackKey),
            'cache_keys' => [
                'insights' => $insightsKey,
                'fallback' => $fallbackKey
            ],
            'timestamp' => now()
        ];
    }

    /**
     * ✅ Debug method to check available content fields
     */
    public function debugContentFields($slug)
    {
        try {
            $result = $this->getInsight($slug);

            if ($result && isset($result['data'])) {
                $post = $result['data'];
                $contentInfo = [];
                $possibleFields = ['body', 'content', 'full_content', 'post_content', 'description', 'excerpt'];

                foreach ($possibleFields as $field) {
                    if (isset($post[$field])) {
                        $contentInfo[$field] = [
                            'length' => strlen($post[$field]),
                            'has_html' => strip_tags($post[$field]) !== $post[$field],
                            'preview' => substr(strip_tags($post[$field]), 0, 100)
                        ];
                    }
                }

                return [
                    'success' => true,
                    'source' => $result['source'] ?? 'insight_api',
                    'content_fields' => $contentInfo,
                    'post_title' => $post['title'] ?? 'No title'
                ];
            }

            return ['error' => 'No data found for slug: ' . $slug];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
