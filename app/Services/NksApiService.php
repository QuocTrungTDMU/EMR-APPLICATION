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
     * Get single blog post detail by slug
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

        try {
            $client = new Client(['timeout' => $this->timeout]);

            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];

            // Multipart form data for insight endpoint
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

            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody()->getContents();

            Log::info('Insight API response', [
                'slug' => $slug,
                'status_code' => $statusCode,
                'content_length' => strlen($responseBody)
            ]);

            if ($statusCode !== 200) {
                Log::error('HTTP Error from Insight API', [
                    'slug' => $slug,
                    'status_code' => $statusCode,
                    'response' => substr($responseBody, 0, 500)
                ]);
                return null;
            }

            $data = json_decode($responseBody, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('JSON Parse Error for insight', [
                    'slug' => $slug,
                    'json_error' => json_last_error_msg(),
                    'response_preview' => substr($responseBody, 0, 500)
                ]);
                return null;
            }

            Log::info('Insight JSON parsed', [
                'slug' => $slug,
                'success' => $data['success'] ?? 'not set',
                'has_data' => isset($data['data'])
            ]);

            // Process insight data
            if (isset($data['data'])) {
                $data['data'] = $this->processInsightData($data['data']);
            }

            // Cache successful response
            Cache::put($cacheKey, $data, 3600);

            Log::info('Insight cached successfully', ['slug' => $slug]);

            return $data;
        } catch (\Throwable $e) {
            Log::error('Insight API Error', [
                'slug' => $slug,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'class' => get_class($e)
            ]);

            return null;
        }
    }

    /**
     * Process insight data from API
     */
    private function processInsightData($insight)
    {
        if (!is_array($insight)) {
            return $insight;
        }

        // Ensure slug exists
        if (!isset($insight['slug']) || empty($insight['slug'])) {
            $insight['slug'] = Str::slug($insight['title'] ?? 'untitled') . '-' . time();
        }

        // Set defaults for missing fields
        $insight['title'] = $insight['title'] ?? 'Untitled';
        $insight['excerpt'] = $insight['excerpt'] ?? $insight['description'] ?? '';
        $insight['body'] = $insight['body'] ?? $insight['content'] ?? $insight['excerpt'] ?? '';
        $insight['image'] = $insight['image'] ?? asset('images/default-blog.jpg');
        $insight['postCategory'] = $insight['postCategory'] ?? $insight['category'] ?? 'General';

        // Handle author
        if (!isset($insight['author']) || !is_array($insight['author'])) {
            $insight['author'] = ['name' => $insight['author_name'] ?? 'Admin'];
        }

        $insight['formatedDate'] = $insight['formatedDate'] ?? $insight['created_at'] ?? date('d/m/Y');

        // Process content
        if (strlen($insight['excerpt']) > 300) {
            $insight['excerpt'] = substr($insight['excerpt'], 0, 300) . '...';
        }

        $insight['readTime'] = $this->estimateReadTime($insight['body']);
        $insight['view'] = $insight['view'] ?? $insight['views'] ?? 0;

        // Handle tags
        if (isset($insight['tags']) && is_string($insight['tags'])) {
            $insight['tags'] = array_map('trim', explode(',', $insight['tags']));
        } elseif (!isset($insight['tags'])) {
            $insight['tags'] = [$insight['postCategory']];
        }

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
                    'title' => 'Blog System Loading',
                    'slug' => 'blog-system-loading-' . time(),
                    'excerpt' => 'Our blog system is currently loading content from the API. Please refresh the page in a moment.',
                    'image' => asset('images/default-blog.jpg'),
                    'postCategory' => 'System',
                    'author' => ['name' => 'System Admin'],
                    'formatedDate' => date('d/m/Y'),
                    'readTime' => 1,
                    'view' => 0
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

        // Clear insight cache entries (you might want to implement a more sophisticated cache clearing)
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
            ]
        ];
    }
}
