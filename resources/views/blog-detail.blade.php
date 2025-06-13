@extends('layouts.app')

@section('title', ($post['title'] ?? 'Blog Detail') . ' - Medik')

@section('content')

<!-- Hero Section with Breadcrumb -->
<section class="relative text-center">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed"
        style="background-image: url('http://medik.wpenginepowered.com/wp-content/uploads/2020/02/breadcrumb-bg.jpg');">
    </div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50" style="opacity: 0.5;"></div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4 py-16 md:py-10">
        <!-- Main Title -->
        <div class="mb-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $post['title'] ?? 'Blog Detail' }}</h1>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center justify-center space-x-2 text-white" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                <i class="fas fa-home mr-1"></i>
                Home
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <a href="{{ route('blogs.index') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                Blogs
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-300">{{ \Str::limit($post['title'] ?? 'Blog Detail', 50) }}</span>
        </nav>
    </div>
</section>

<!-- Main Content -->
<div id="main" class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-12">
        <div class="grid lg:grid-cols-4 gap-8">

            <!-- Main Article Content -->
            <section id="primary" class="lg:col-span-3">
                <article class="bg-white rounded-xl shadow-lg overflow-hidden">

                    <!-- Featured Image Section -->
                    <div class="relative">
                        <div class="w-full h-96 lg:h-[500px] overflow-hidden">
                            <img src="{{ $post['image'] ?? 'https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-4-6.jpg' }}"
                                alt="{{ $post['title'] ?? 'Blog Image' }}"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>

                        <!-- Overlay Info -->
                        <div class="absolute top-6 left-6">
                            <div class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg">
                                <i class="fas fa-calendar mr-2"></i>
                                {{ $post['formatedDate'] ?? 'May 16, 2020' }}
                            </div>
                        </div>

                        <div class="absolute top-6 right-6">
                            <div class="bg-white bg-opacity-95 text-gray-700 px-4 py-2 rounded-lg shadow-lg flex items-center">
                                <i class="fas fa-comment mr-2"></i>
                                <a href="#comments" class="hover:text-blue-500 transition-colors">{{ $post['view'] ?? 0 }} Views</a>
                            </div>
                        </div>

                        <!-- Category Badge -->
                        <div class="absolute bottom-6 left-6">
                            <span class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium">
                                {{ $post['postCategory'] ?? 'Health & Safety' }}
                            </span>
                        </div>
                    </div>

                    <!-- Article Header -->
                    <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
                            <!-- Author Info -->
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-600">Posted by:</span>
                                    <a href="#" class="block text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                                        {{ $post['author']['name'] ?? 'Dr. Ram Kumar' }}
                                    </a>
                                </div>
                            </div>

                            <!-- Meta Info -->
                            <div class="flex items-center space-x-6 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <span>{{ $post['readTime'] ?? 5 }} min read</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    <span>{{ number_format($post['view'] ?? 1200) }} views</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-share mr-2"></i>
                                    <span>Share</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Body -->
                    <div class="px-8 py-10">

                        <!-- Article Title -->
                        <div class="mb-8">
                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-4">
                                {{ $post['title'] ?? 'The Complete Guide to Hand Sanitizers: Protection Against COVID-19' }}
                            </h1>
                            <p class="text-xl text-gray-600 leading-relaxed">
                                {{ $post['excerpt'] ?? 'Learn everything you need to know about hand sanitizers, their effectiveness, proper usage, and how they can protect you and your family.' }}
                            </p>
                        </div>

                        <!-- Main Content -->
                        <div class="prose prose-lg max-w-none">
                            @if(isset($post['body']) && !empty($post['body']))
                            <div class="blog-content">
                                {!! $post['body'] !!}
                            </div>
                            @else
                            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                                {{ $post['excerpt'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt nunc lorem, nec faucibus mi facilisis eget. Mauris laoreet, nisl id faucibus pellentesque, mi mi tempor enim, sit amet interdum felis nibh a leo. Donec efficitur velit ac nisi rutrum, eu ornare augue tristique. Vivamus accumsan nisl id massa finibus aliquet. Pellentesque blandit ut urna dignissim pulvinar. Aliquam in ultrices ante. Nam condimentum eleifend consectetur.' }}
                            </p>

                            <p class="text-gray-700 leading-relaxed mb-10 text-lg">
                                Fusce quam nunc, bibendum eget venenatis a, volutpat at ligula. Ut interdum elit vel ante tincidunt mattis. Aenean dignissim vulputate justo, sed tincidunt sapien laoreet a. Fusce vehicula, turpis sed hendrerit gravida, ante justo accumsan nisi, non congue metus risus a lorem.
                            </p>
                            @endif
                        </div>

                        <!-- Two Column Section -->
                        <div class="grid lg:grid-cols-2 gap-10 mb-12">
                            <!-- Left Column - Image -->
                            <div>
                                <div class="rounded-xl overflow-hidden shadow-lg group">
                                    <img src="{{ $post['image'] ?? 'https://aagan.wpengine.com/wp-content/uploads/2018/05/blog10.jpg' }}"
                                        alt="{{ $post['title'] ?? 'Hand Sanitizer Usage' }}"
                                        class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            </div>

                            <!-- Right Column - Quote -->
                            <div class="flex items-center">
                                <blockquote class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-xl border-l-4 border-blue-500 shadow-md">
                                    <div class="mb-4">
                                        <i class="fas fa-quote-left text-blue-500 text-3xl"></i>
                                    </div>
                                    <p class="text-gray-700 italic text-lg leading-relaxed mb-6">
                                        "{{ $post['excerpt'] ?? 'Proper hand hygiene is one of the most effective ways to prevent the spread of infectious diseases. Hand sanitizers with at least 60% alcohol content can be a reliable alternative when soap and water are not available.' }}"
                                    </p>
                                    <cite class="text-blue-600 font-semibold">– {{ $post['author']['name'] ?? 'World Health Organization' }}</cite>
                                </blockquote>
                            </div>
                        </div>




                        <!-- Social Share Buttons -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between py-8 border-t border-b border-gray-200 mb-8 space-y-4 sm:space-y-0">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <i class="fas fa-share-alt mr-2 text-blue-500"></i>
                                    Share this article:
                                </h4>
                            </div>
                            <div class="flex space-x-3">
                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                    target="_blank"
                                    class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition-all duration-200 hover:scale-110 shadow-lg group"
                                    title="Share on Facebook">
                                    <i class="fab fa-facebook-f text-lg group-hover:animate-pulse"></i>
                                </a>

                                <!-- Twitter/X -->
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post['title'] ?? '') }}"
                                    target="_blank"
                                    class="bg-black hover:bg-gray-800 text-white p-3 rounded-full transition-all duration-200 hover:scale-110 shadow-lg group"
                                    title="Share on X (Twitter)">
                                    <i class="fab fa-x-twitter text-lg group-hover:animate-pulse"></i>
                                </a>

                                <!-- LinkedIn -->
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                                    target="_blank"
                                    class="bg-blue-700 hover:bg-blue-800 text-white p-3 rounded-full transition-all duration-200 hover:scale-110 shadow-lg group"
                                    title="Share on LinkedIn">
                                    <i class="fab fa-linkedin-in text-lg group-hover:animate-pulse"></i>
                                </a>

                                <!-- WhatsApp -->
                                <a href="https://wa.me/?text={{ urlencode($post['title'] ?? '') }}%20{{ urlencode(request()->url()) }}"
                                    target="_blank"
                                    class="bg-green-600 hover:bg-green-700 text-white p-3 rounded-full transition-all duration-200 hover:scale-110 shadow-lg group"
                                    title="Share on WhatsApp">
                                    <i class="fab fa-whatsapp text-lg group-hover:animate-pulse"></i>
                                </a>

                                <!-- Copy Link -->
                                <button onclick="copyToClipboard('{{ request()->url() }}')"
                                    class="bg-gray-600 hover:bg-gray-700 text-white p-3 rounded-full transition-all duration-200 hover:scale-110 shadow-lg group"
                                    title="Copy Link">
                                    <i class="fas fa-link text-lg group-hover:animate-pulse"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Tags Section -->
                        <div class="px-8 py-6 border-t border-gray-200 bg-gray-50">
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="text-gray-600 font-medium flex items-center">
                                    <i class="fas fa-tags mr-2"></i>
                                    Tags:
                                </span>
                                @if(isset($post['tags']) && is_array($post['tags']))
                                @foreach($post['tags'] as $tag)
                                <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200">
                                    {{ $tag }}
                                </a>
                                @endforeach
                                @else
                                <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200">
                                    {{ $post['postCategory'] ?? 'Health' }}
                                </a>
                                <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200">
                                    Safety
                                </a>
                                <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200">
                                    COVID-19
                                </a>
                                <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200">
                                    Prevention
                                </a>
                                @endif
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div id="comments" class="px-8 py-10 border-t border-gray-200">
                            <div class="comments-area">
                                <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                                    <i class="fas fa-comments mr-3 text-blue-500"></i>
                                    Comments (0)
                                </h3>

                                <!-- Comment Form -->
                                <div class="bg-gray-50 rounded-xl p-8 mb-8">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-6">Leave a Comment</h4>
                                    <form class="space-y-6">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-gray-700 font-medium mb-2">Name *</label>
                                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                            <div>
                                                <label class="block text-gray-700 font-medium mb-2">Email *</label>
                                                <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-gray-700 font-medium mb-2">Comment *</label>
                                            <textarea rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                                        </div>
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200">
                                            Post Comment
                                        </button>
                                    </form>
                                </div>

                                <!-- No Comments Message -->
                                <div class="text-center py-12 text-gray-500">
                                    <i class="fas fa-comment-dots text-4xl mb-4 opacity-50"></i>
                                    <p class="text-lg">No comments yet. Be the first to share your thoughts!</p>
                                </div>
                            </div>
                        </div>
                </article>

                <!-- Related Posts Section -->
                @if(isset($relatedPosts) && count($relatedPosts) > 0)
                <section class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Posts</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($relatedPosts as $related)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <a href="{{ route('blogs.show', $related['slug']) }}">
                                <img src="{{ $related['image'] ?? 'https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-1-1.jpg' }}"
                                    alt="{{ $related['title'] }}"
                                    class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
                            </a>
                            <div class="p-4">
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>{{ $related['formatedDate'] ?? date('d/m/Y') }}</span>
                                </div>
                                <h3 class="font-semibold text-lg mb-2">
                                    <a href="{{ route('blogs.show', $related['slug']) }}"
                                        class="hover:text-blue-600 transition-colors">
                                        {{ \Str::limit($related['title'], 60) }}
                                    </a>
                                </h3>
                                @if($related['excerpt'])
                                <p class="text-gray-600 text-sm">{{ \Str::limit($related['excerpt'], 100) }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
            </section>

            <!-- Sidebar -->
            <aside class="lg:col-span-1 space-y-8">

                <!-- Search Widget -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Search</h3>
                    <form action="{{ route('blogs.index') }}" method="GET">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Search articles..."
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </form>
                </div>

                <!-- Recent Posts Widget -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Recent Posts</h3>
                    <div class="space-y-4">
                        @if(isset($relatedPosts) && count($relatedPosts) > 0)
                        @foreach(array_slice($relatedPosts, 0, 3) as $index => $recent)
                        <div class="flex space-x-4">
                            <img src="{{ $recent['image'] ?? 'https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-' . ($index + 1) . '-1.jpg' }}"
                                alt="{{ $recent['title'] }}"
                                class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                            <div>
                                <h4 class="text-sm font-medium text-gray-800 hover:text-blue-600 transition-colors cursor-pointer line-clamp-2">
                                    <a href="{{ route('blogs.show', $recent['slug']) }}">{{ \Str::limit($recent['title'], 50) }}</a>
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $recent['formatedDate'] ?? date('M d, Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="flex space-x-4">
                            <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-{{ $i }}-1.jpg"
                                alt="Recent Post"
                                class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                            <div>
                                <h4 class="text-sm font-medium text-gray-800 hover:text-blue-600 transition-colors cursor-pointer line-clamp-2">
                                    Health Tips for Better Living {{ $i }}
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">May {{ 15 + $i }}, 2020</p>
                            </div>
                    </div>
                    @endfor
                    @endif
                </div>
        </div>

        <!-- Categories Widget -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Categories</h3>
            <ul class="space-y-3">
                <li><a href="{{ route('blogs.index') }}" class="flex items-center justify-between text-gray-700 hover:text-blue-600 transition-colors">
                        <span>All Posts</span>
                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs">{{ $totalPosts ?? 0 }}</span>
                    </a></li>
                <li><a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-600 transition-colors">
                        <span>{{ $post['postCategory'] ?? 'Health & Wellness' }}</span>
                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs">Current</span>
                    </a></li>
                <li><a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-600 transition-colors">
                        <span>Medical Devices</span>
                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs">8</span>
                    </a></li>
                <li><a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-600 transition-colors">
                        <span>Safety Tips</span>
                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs">15</span>
                    </a></li>
                <li><a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-600 transition-colors">
                        <span>COVID-19</span>
                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs">6</span>
                    </a></li>
            </ul>
        </div>

        <!-- Newsletter Widget -->
        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
            <h3 class="text-lg font-semibold mb-4">Subscribe to Newsletter</h3>
            <p class="text-blue-100 mb-6 text-sm">Get the latest health tips and medical updates delivered to your inbox.</p>
            <form class="space-y-4">
                <input type="email" placeholder="Your email address"
                    class="w-full px-4 py-3 rounded-lg text-gray-800 focus:ring-2 focus:ring-white focus:ring-opacity-50">
                <button type="submit" class="w-full bg-white text-blue-600 font-semibold py-3 rounded-lg hover:bg-gray-100 transition-colors">
                    Subscribe Now
                </button>
            </form>
        </div>
        </aside>
    </div>
</div>
</div>

@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .prose img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1.5rem auto;
    }

    .prose h1,
    .prose h2,
    .prose h3 {
        color: #1f2937;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .prose p {
        margin-bottom: 1.5rem;
        line-height: 1.7;
    }

    .prose blockquote {
        border-left: 4px solid #3b82f6;
        padding-left: 1rem;
        margin: 1.5rem 0;
        font-style: italic;
        background: #f8fafc;
        padding: 1rem;
        border-radius: 0 8px 8px 0;
    }
</style>
@endpush


@push('styles')
<style>
    /* ✅ ENHANCED TYPOGRAPHY & SPACING */
    .blog-content {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        line-height: 1.8;
        font-size: 1.125rem;
        color: #2d3748;
        max-width: none;
    }

    /* ✅ BEAUTIFUL PARAGRAPH STYLING */
    .blog-content p {
        margin-bottom: 1.75rem;
        font-size: 1.125rem;
        line-height: 1.8;
        color: #4a5568;
        text-align: justify;
        font-weight: 400;
        letter-spacing: 0.025em;
    }

    /* ✅ ENHANCED HEADINGS */
    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4 {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        font-weight: 700;
        color: #1a202c;
        margin-top: 3rem;
        margin-bottom: 1.5rem;
        line-height: 1.3;
        letter-spacing: -0.025em;
    }

    .blog-content h1 {
        font-size: 2.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 2rem;
    }

    .blog-content h2 {
        font-size: 2rem;
        color: #2d3748;
        border-bottom: 3px solid #e2e8f0;
        padding-bottom: 0.75rem;
        position: relative;
    }

    .blog-content h2::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .blog-content h3 {
        font-size: 1.5rem;
        color: #4299e1;
        margin-top: 2.5rem;
    }

    /* ✅ FIRST PARAGRAPH SPECIAL STYLING */
    .blog-content p:first-of-type {
        font-size: 1.25rem;
        font-weight: 500;
        color: #2d3748;
        line-height: 1.7;
        margin-bottom: 2rem;
        padding-left: 1rem;
        border-left: 4px solid #667eea;
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        padding: 1.5rem;
        border-radius: 0 12px 12px 0;
        position: relative;
    }

    .blog-content p:first-of-type::before {
        content: '"';
        font-size: 4rem;
        color: #667eea;
        position: absolute;
        top: -10px;
        left: 20px;
        opacity: 0.3;
        font-family: Georgia, serif;
    }

    /* ✅ BEAUTIFUL LISTS */
    .blog-content ul,
    .blog-content ol {
        margin: 2rem 0;
        padding-left: 0;
        list-style: none;
    }

    .blog-content ul li {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 1rem;
        font-size: 1.125rem;
        line-height: 1.7;
        color: #4a5568;
    }

    .blog-content ul li::before {
        content: '●';
        color: #667eea;
        font-size: 1.5rem;
        position: absolute;
        left: 0;
        top: -2px;
    }

    .blog-content ol {
        counter-reset: custom-counter;
    }

    .blog-content ol li {
        position: relative;
        padding-left: 3rem;
        margin-bottom: 1rem;
        counter-increment: custom-counter;
    }

    .blog-content ol li::before {
        content: counter(custom-counter);
        position: absolute;
        left: 0;
        top: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        font-weight: bold;
    }

    /* ✅ ENHANCED LINKS */
    .blog-content a {
        color: #4299e1;
        text-decoration: none;
        font-weight: 500;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
        position: relative;
    }

    .blog-content a::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #4299e1, #667eea);
        transition: width 0.3s ease;
    }

    .blog-content a:hover::after {
        width: 100%;
    }

    .blog-content a:hover {
        color: #2b6cb0;
    }

    /* ✅ BEAUTIFUL BLOCKQUOTES */
    .blog-content blockquote {
        margin: 3rem 0;
        padding: 2rem;
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        border-left: 5px solid #667eea;
        border-radius: 0 15px 15px 0;
        position: relative;
        font-style: italic;
        font-size: 1.25rem;
        color: #2d3748;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .blog-content blockquote::before {
        content: '"';
        font-size: 6rem;
        color: #667eea;
        position: absolute;
        top: -20px;
        left: 20px;
        opacity: 0.2;
        font-family: Georgia, serif;
    }

    /* ✅ CODE STYLING */
    .blog-content code {
        background: linear-gradient(135deg, #2d3748, #4a5568);
        color: #e2e8f0;
        padding: 0.25rem 0.75rem;
        border-radius: 8px;
        font-family: 'Fira Code', 'Monaco', 'Consolas', monospace;
        font-size: 0.875rem;
        font-weight: 500;
        letter-spacing: 0.05em;
    }

    .blog-content pre {
        background: linear-gradient(135deg, #1a202c, #2d3748);
        color: #e2e8f0;
        padding: 2rem;
        border-radius: 15px;
        overflow-x: auto;
        margin: 2rem 0;
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .blog-content pre::before {
        content: '';
        position: absolute;
        top: 1rem;
        left: 1rem;
        width: 12px;
        height: 12px;
        background: #ff5f56;
        border-radius: 50%;
        box-shadow: 20px 0 0 #ffbd2e, 40px 0 0 #27ca3f;
    }

    /* ✅ IMAGES ENHANCEMENT */
    .blog-content img {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        margin: 2.5rem auto;
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: block;
    }

    .blog-content img:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px -15px rgba(0, 0, 0, 0.25);
    }

    /* ✅ TABLE STYLING */
    .blog-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 2.5rem 0;
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .blog-content th {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        font-size: 1rem;
    }

    .blog-content td {
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
        color: #4a5568;
    }

    .blog-content tr:nth-child(even) {
        background: #f7fafc;
    }

    .blog-content tr:hover {
        background: #edf2f7;
        transition: background 0.2s ease;
    }

    /* ✅ SPACING BETWEEN ELEMENTS */
    .blog-content>*+* {
        margin-top: 1.5rem;
    }

    .blog-content>h2+*,
    .blog-content>h3+* {
        margin-top: 1rem;
    }

    /* ✅ RESPONSIVE DESIGN */
    @media (max-width: 768px) {
        .blog-content {
            font-size: 1rem;
        }

        .blog-content h1 {
            font-size: 2rem;
        }

        .blog-content h2 {
            font-size: 1.5rem;
        }

        .blog-content h3 {
            font-size: 1.25rem;
        }

        .blog-content p:first-of-type {
            font-size: 1.125rem;
            padding: 1rem;
        }

        .blog-content blockquote {
            padding: 1.5rem;
            margin: 2rem 0;
        }

        .blog-content pre {
            padding: 1rem;
        }
    }

    /* ✅ READING PROGRESS INDICATOR */
    .reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        z-index: 1000;
        transition: width 0.3s ease;
    }

    /* ✅ SMOOTH SCROLLING */
    html {
        scroll-behavior: smooth;
    }

    /* ✅ SELECTION STYLING */
    .blog-content ::selection {
        background: rgba(102, 126, 234, 0.2);
        color: #1a202c;
    }

    /* ✅ FOCUS STYLES FOR ACCESSIBILITY */
    .blog-content a:focus,
    .blog-content button:focus {
        outline: 2px solid #667eea;
        outline-offset: 2px;
    }
</style>
@endpush


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create reading progress bar
        const progressBar = document.createElement('div');
        progressBar.className = 'reading-progress';
        document.body.appendChild(progressBar);

        // Update progress on scroll
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset;
            const documentHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrollTop / documentHeight) * 100;
            progressBar.style.width = progress + '%';
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
@endpush

@push('scripts')
<script>
    // Xóa tất cả empty p tags sau khi content được render
    document.addEventListener('DOMContentLoaded', function() {
        // Tìm và xóa các p tags rỗng hoặc chỉ chứa &nbsp;
        const emptyParagraphs = document.querySelectorAll('.blog-content p');

        emptyParagraphs.forEach(p => {
            const text = p.textContent || p.innerText || '';
            const cleanText = text.replace(/\s+/g, '').replace(/&nbsp;/g, '');

            // Nếu paragraph rỗng hoặc chỉ chứa whitespace
            if (cleanText === '' || cleanText.length === 0) {
                p.remove();
            }
        });
    });
</script>
@endpush