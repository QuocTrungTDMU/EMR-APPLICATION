<?php
// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use App\Services\NksApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    protected $nksApiService;

    public function __construct(NksApiService $nksApiService)
    {
        $this->nksApiService = $nksApiService;
    }

    /**
     * Display a listing of blog posts
     */
    public function index(Request $request)
    {
        try {
            Log::info('BlogController::index called', [
                'page' => $request->get('page', 1),
                'search' => $request->get('search')
            ]);

            // Get posts from NKS API
            $apiResponse = $this->nksApiService->getInsights();

            if (!$apiResponse || !isset($apiResponse['success']) || !$apiResponse['success']) {
                throw new \Exception('Failed to fetch blog posts from API');
            }

            $allPosts = $apiResponse['data'] ?? [];

            Log::info('Posts fetched successfully', ['total_posts' => count($allPosts)]);

            // Search functionality
            $searchQuery = $request->get('search');
            $posts = $allPosts;

            if ($searchQuery) {
                $posts = collect($allPosts)->filter(function ($post) use ($searchQuery) {
                    return str_contains(strtolower($post['title'] ?? ''), strtolower($searchQuery)) ||
                        str_contains(strtolower($post['excerpt'] ?? ''), strtolower($searchQuery)) ||
                        str_contains(strtolower($post['postCategory'] ?? ''), strtolower($searchQuery));
                })->values()->toArray();

                Log::info('Search applied', [
                    'query' => $searchQuery,
                    'filtered_count' => count($posts)
                ]);
            }

            // Get unique categories for sidebar
            $categories = collect($allPosts)
                ->groupBy('postCategory')
                ->map(function ($items, $category) {
                    return [
                        'name' => $category,
                        'count' => $items->count(),
                        'slug' => Str::slug($category)
                    ];
                })
                ->sortByDesc('count')
                ->values();

            // Pagination logic
            $page = max(1, (int) $request->get('page', 1));
            $perPage = 9; // 3x3 grid
            $offset = ($page - 1) * $perPage;
            $paginatedPosts = array_slice($posts, $offset, $perPage);
            $totalPages = ceil(count($posts) / $perPage);

            Log::info('Pagination processed', [
                'page' => $page,
                'per_page' => $perPage,
                'total_pages' => $totalPages,
                'paginated_count' => count($paginatedPosts)
            ]);

            return view('blogs', compact(
                'paginatedPosts',
                'categories',
                'page',
                'totalPages',
                'posts'
            ))->with([
                'searchQuery' => $searchQuery,
                'totalPosts' => count($allPosts),
                'filteredPosts' => count($posts)
            ]);
        } catch (\Exception $e) {
            Log::error('Blog Index Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Fallback with empty data
            return view('blogs', [
                'paginatedPosts' => [],
                'categories' => [],
                'page' => 1,
                'totalPages' => 1,
                'posts' => [],
                'searchQuery' => $request->get('search'),
                'totalPosts' => 0,
                'filteredPosts' => 0,
                'error' => 'Unable to load blog posts at this time.'
            ]);
        }
    }

    /**
     * ✅ FIXED - Display a specific blog post with multiple fallback methods
     */
    public function show($slug)
    {
        Log::info('BlogController::show called', ['slug' => $slug]);

        try {
            $post = null;

            // ✅ Method 1: Try insight API first
            Log::info('Trying insight API...');
            $apiResponse = $this->nksApiService->getInsight($slug);

            if ($apiResponse && isset($apiResponse['success']) && $apiResponse['success'] && isset($apiResponse['data'])) {
                $post = $apiResponse['data'];
                Log::info('✅ Post found via insight API', ['title' => $post['title']]);
            } else {
                Log::warning('Insight API failed or no data', [
                    'has_response' => !is_null($apiResponse),
                    'success' => $apiResponse['success'] ?? 'not set'
                ]);

                // ✅ Method 2: Fallback - search in insights list
                Log::info('Trying fallback method - search in insights list...');
                $allPostsResponse = $this->nksApiService->getInsights();

                if ($allPostsResponse && isset($allPostsResponse['data'])) {
                    // Exact slug match
                    $post = collect($allPostsResponse['data'])->firstWhere('slug', $slug);

                    if ($post) {
                        Log::info('✅ Post found via exact slug match', ['title' => $post['title']]);
                    } else {
                        // ✅ Method 3: Try partial slug match (for similar slugs)
                        Log::info('Trying partial slug match...');
                        $slugParts = explode('-', $slug);
                        $searchTerm = $slugParts[0]; // First part of slug

                        $post = collect($allPostsResponse['data'])->first(function ($p) use ($searchTerm) {
                            return str_contains($p['slug'], $searchTerm);
                        });

                        if ($post) {
                            Log::info('✅ Post found via partial match', [
                                'original_slug' => $slug,
                                'found_slug' => $post['slug'],
                                'title' => $post['title']
                            ]);

                            // Redirect to correct slug for SEO
                            return redirect()->route('blogs.show', $post['slug'], 301);
                        }
                    }
                }
            }

            // ✅ No post found with any method
            if (!$post) {
                Log::error('❌ Post not found with any method', ['slug' => $slug]);

                // ✅ Debug mode - show available slugs
                if (config('app.debug')) {
                    $allPostsResponse = $this->nksApiService->getInsights();
                    $availableSlugs = collect($allPostsResponse['data'] ?? [])->pluck('slug')->take(20);

                    return response()->view('errors.404', [
                        'message' => 'Blog post not found',
                        'slug' => $slug,
                        'available_slugs' => $availableSlugs,
                        'debug_info' => [
                            'searched_slug' => $slug,
                            'total_available_posts' => count($allPostsResponse['data'] ?? [])
                        ]
                    ], 404);
                }

                abort(404, 'Blog post not found');
            }

            // ✅ Get related posts
            $allPostsResponse = $this->nksApiService->getInsights();
            $allPosts = $allPostsResponse['data'] ?? [];

            $relatedPosts = collect($allPosts)
                ->where('postCategory', $post['postCategory'] ?? 'General')
                ->where('slug', '!=', $post['slug']) // Use actual post slug
                ->shuffle()
                ->take(3)
                ->values()
                ->toArray();

            Log::info('Related posts found', ['count' => count($relatedPosts)]);

            $totalPosts = count($allPosts);

            Log::info('✅ Successfully returning blog-detail view', [
                'post_title' => $post['title'],
                'post_slug' => $post['slug'],
                'related_count' => count($relatedPosts)
            ]);

            return view('blog-detail', compact('post', 'relatedPosts', 'totalPosts'));
        } catch (\Exception $e) {
            Log::error('Blog Show Error', [
                'slug' => $slug,
                'message' => $e->getMessage(),
                'file' => basename($e->getFile()),
                'line' => $e->getLine(),
                'trace' => array_slice(explode("\n", $e->getTraceAsString()), 0, 5)
            ]);

            // ✅ Debug mode - show full error
            if (config('app.debug')) {
                return response('<h1>Blog Show Error</h1><pre>' . $e->getMessage() . '</pre><p>Slug: ' . $slug . '</p><pre>' . $e->getTraceAsString() . '</pre>', 500);
            }

            abort(404, 'Blog post not found');
        }
    }

    /**
     * Filter posts by category
     */
    public function category($categorySlug, Request $request)
    {
        try {
            Log::info('BlogController::category called', [
                'category_slug' => $categorySlug,
                'page' => $request->get('page', 1)
            ]);

            $apiResponse = $this->nksApiService->getInsights();

            if (!$apiResponse || !isset($apiResponse['success']) || !$apiResponse['success']) {
                throw new \Exception('Failed to fetch blog posts from API');
            }

            $allPosts = $apiResponse['data'] ?? [];

            // Convert slug back to category name
            $categoryName = str_replace('-', ' ', $categorySlug);
            $categoryName = ucwords($categoryName);

            // Filter by category
            $posts = collect($allPosts)->filter(function ($post) use ($categorySlug) {
                return Str::slug($post['postCategory'] ?? '') === $categorySlug;
            })->values()->toArray();

            Log::info('Category filter applied', [
                'category' => $categoryName,
                'filtered_count' => count($posts)
            ]);

            if (empty($posts)) {
                Log::warning('No posts found for category', ['category_slug' => $categorySlug]);
                return redirect()->route('blogs.index')->with('error', 'Category not found or has no posts');
            }

            // Get all categories for sidebar
            $categories = collect($allPosts)
                ->groupBy('postCategory')
                ->map(function ($items, $category) use ($categorySlug) {
                    return [
                        'name' => $category,
                        'count' => $items->count(),
                        'slug' => Str::slug($category),
                        'active' => Str::slug($category) === $categorySlug
                    ];
                })
                ->sortByDesc('count')
                ->values();

            // Pagination
            $page = max(1, (int) $request->get('page', 1));
            $perPage = 9;
            $offset = ($page - 1) * $perPage;
            $paginatedPosts = array_slice($posts, $offset, $perPage);
            $totalPages = ceil(count($posts) / $perPage);

            return view('blogs', compact('paginatedPosts', 'categories', 'page', 'totalPages', 'posts'))
                ->with([
                    'currentCategory' => $categoryName,
                    'currentCategorySlug' => $categorySlug,
                    'totalPosts' => count($allPosts),
                    'filteredPosts' => count($posts)
                ]);
        } catch (\Exception $e) {
            Log::error('Blog Category Error', [
                'category_slug' => $categorySlug,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('blogs.index')->with('error', 'Unable to load category posts');
        }
    }

    /**
     * Search blog posts
     */
    public function search(Request $request)
    {
        $searchQuery = $request->get('q', $request->get('search'));

        return redirect()->route('blogs.index', ['search' => $searchQuery]);
    }

    /**
     * Get blog posts for AJAX requests
     */
    public function ajaxPosts(Request $request)
    {
        try {
            $apiResponse = $this->nksApiService->getInsights();

            if (!$apiResponse || !isset($apiResponse['success']) || !$apiResponse['success']) {
                return response()->json(['error' => 'Failed to fetch posts'], 500);
            }

            $posts = $apiResponse['data'] ?? [];

            // Apply filters
            $category = $request->get('category');
            $search = $request->get('search');

            if ($category) {
                $posts = collect($posts)->where('postCategory', $category)->values()->toArray();
            }

            if ($search) {
                $posts = collect($posts)->filter(function ($post) use ($search) {
                    return str_contains(strtolower($post['title'] ?? ''), strtolower($search)) ||
                        str_contains(strtolower($post['excerpt'] ?? ''), strtolower($search));
                })->values()->toArray();
            }

            // Pagination
            $page = max(1, (int) $request->get('page', 1));
            $perPage = $request->get('per_page', 9);
            $offset = ($page - 1) * $perPage;
            $paginatedPosts = array_slice($posts, $offset, $perPage);

            return response()->json([
                'success' => true,
                'posts' => $paginatedPosts,
                'pagination' => [
                    'current_page' => $page,
                    'per_page' => $perPage,
                    'total' => count($posts),
                    'total_pages' => ceil(count($posts) / $perPage),
                    'has_more' => $page < ceil(count($posts) / $perPage)
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('AJAX Posts Error: ' . $e->getMessage());

            return response()->json(['error' => 'Unable to load posts'], 500);
        }
    }

    /**
     * Clear blog cache
     */
    public function clearCache()
    {
        try {
            $this->nksApiService->clearCache();

            return redirect()->back()->with('success', 'Blog cache cleared successfully');
        } catch (\Exception $e) {
            Log::error('Clear Cache Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to clear cache');
        }
    }

    /**
     * Get cache statistics
     */
    public function cacheStats()
    {
        try {
            $stats = $this->nksApiService->getCacheStats();

            return response()->json([
                'success' => true,
                'cache_stats' => $stats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}
