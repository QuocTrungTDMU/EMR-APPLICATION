@extends('layouts.app')

@section('title', 'Hand Sanitizers - Medik Blog')

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
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Hand Sanitizers</h1>
            <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                Essential protection for your health and safety
            </p>
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
            <a href="{{ url('/blogs') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                Blogs
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-300">Hand Sanitizers</span>
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
                            <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-4-6.jpg"
                                alt="Hand Sanitizers"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>

                        <!-- Overlay Info -->
                        <div class="absolute top-6 left-6">
                            <div class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg">
                                <i class="fas fa-calendar mr-2"></i>
                                May 16, 2020
                            </div>
                        </div>

                        <div class="absolute top-6 right-6">
                            <div class="bg-white bg-opacity-95 text-gray-700 px-4 py-2 rounded-lg shadow-lg flex items-center">
                                <i class="fas fa-comment mr-2"></i>
                                <a href="#comments" class="hover:text-blue-500 transition-colors">0 Comments</a>
                            </div>
                        </div>

                        <!-- Category Badge -->
                        <div class="absolute bottom-6 left-6">
                            <span class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-medium">
                                Health & Safety
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
                                        Dr. Ram Kumar
                                    </a>
                                </div>
                            </div>

                            <!-- Meta Info -->
                            <div class="flex items-center space-x-6 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <span>5 min read</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-eye mr-2"></i>
                                    <span>1.2k views</span>
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
                                The Complete Guide to Hand Sanitizers: Protection Against COVID-19
                            </h1>
                            <p class="text-xl text-gray-600 leading-relaxed">
                                Learn everything you need to know about hand sanitizers, their effectiveness, proper usage, and how they can protect you and your family.
                            </p>
                        </div>

                        <!-- Main Content -->
                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 leading-relaxed mb-6 text-lg">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt nunc lorem, nec faucibus mi facilisis eget. Mauris laoreet, nisl id faucibus pellentesque, mi mi tempor enim, sit amet interdum felis nibh a leo. Donec efficitur velit ac nisi rutrum, eu ornare augue tristique. Vivamus accumsan nisl id massa finibus aliquet. Pellentesque blandit ut urna dignissim pulvinar. Aliquam in ultrices ante. Nam condimentum eleifend consectetur.
                            </p>

                            <p class="text-gray-700 leading-relaxed mb-10 text-lg">
                                Fusce quam nunc, bibendum eget venenatis a, volutpat at ligula. Ut interdum elit vel ante tincidunt mattis. Aenean dignissim vulputate justo, sed tincidunt sapien laoreet a. Fusce vehicula, turpis sed hendrerit gravida, ante justo accumsan nisi, non congue metus risus a lorem.
                            </p>
                        </div>

                        <!-- Two Column Section -->
                        <div class="grid lg:grid-cols-2 gap-10 mb-12">
                            <!-- Left Column - Image -->
                            <div>
                                <div class="rounded-xl overflow-hidden shadow-lg group">
                                    <img src="https://aagan.wpengine.com/wp-content/uploads/2018/05/blog10.jpg"
                                        alt="Hand Sanitizer Usage"
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
                                        "Proper hand hygiene is one of the most effective ways to prevent the spread of infectious diseases. Hand sanitizers with at least 60% alcohol content can be a reliable alternative when soap and water are not available."
                                    </p>
                                    <cite class="text-blue-600 font-semibold">– World Health Organization</cite>
                                </blockquote>
                            </div>
                        </div>

                        <!-- Key Points Section -->
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-8 mb-12 border border-green-200">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <i class="fas fa-lightbulb text-yellow-500 mr-3"></i>
                                Key Benefits of Hand Sanitizers
                            </h3>

                            <div class="grid md:grid-cols-2 gap-8">
                                <!-- Left Column - Benefits List -->
                                <div>
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <div class="bg-green-500 rounded-full w-3 h-3 mt-2 mr-4 flex-shrink-0"></div>
                                            <span class="text-gray-700 text-lg">Kills 99.9% of germs and bacteria instantly</span>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="bg-green-500 rounded-full w-3 h-3 mt-2 mr-4 flex-shrink-0"></div>
                                            <span class="text-gray-700 text-lg">Convenient and portable for on-the-go use</span>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="bg-green-500 rounded-full w-3 h-3 mt-2 mr-4 flex-shrink-0"></div>
                                            <span class="text-gray-700 text-lg">No water or soap required</span>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="bg-green-500 rounded-full w-3 h-3 mt-2 mr-4 flex-shrink-0"></div>
                                            <span class="text-gray-700 text-lg">Effective against viruses including COVID-19</span>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="bg-green-500 rounded-full w-3 h-3 mt-2 mr-4 flex-shrink-0"></div>
                                            <span class="text-gray-700 text-lg">Quick application and fast drying</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Right Column - Usage Tips -->
                                <div class="bg-white rounded-lg p-6 shadow-sm border">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                                        Proper Usage Tips
                                    </h4>
                                    <ol class="space-y-3 text-gray-700">
                                        <li class="flex items-start">
                                            <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold mr-3 mt-0.5 flex-shrink-0">1</span>
                                            <span>Apply enough product to cover all hand surfaces</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold mr-3 mt-0.5 flex-shrink-0">2</span>
                                            <span>Rub hands together for at least 20 seconds</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold mr-3 mt-0.5 flex-shrink-0">3</span>
                                            <span>Cover all surfaces including fingertips and nails</span>
                                        </li>
                                        <li class="flex items-start">
                                            <span class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm font-bold mr-3 mt-0.5 flex-shrink-0">4</span>
                                            <span>Continue until hands are completely dry</span>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Content -->
                        <div class="prose prose-lg max-w-none mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">When to Use Hand Sanitizers</h2>
                            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>

                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-lg mb-8">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>
                                    <h3 class="text-lg font-semibold text-yellow-800">Important Note</h3>
                                </div>
                                <p class="text-yellow-700">
                                    Hand sanitizers are most effective when hands are not visibly dirty. For best results, wash with soap and water when available, especially before eating or after using the restroom.
                                </p>
                            </div>
                        </div>

                        <!-- Social Share Buttons -->
                        <div class="flex items-center justify-between py-6 border-t border-b border-gray-200 mb-8">
                            <div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Share this article:</h4>
                            </div>
                            <div class="flex space-x-3">
                                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition-colors duration-200">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="bg-blue-400 hover:bg-blue-500 text-white p-3 rounded-full transition-colors duration-200">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-blue-700 hover:bg-blue-800 text-white p-3 rounded-full transition-colors duration-200">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-green-600 hover:bg-green-700 text-white p-3 rounded-full transition-colors duration-200">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tags Section -->
                    <div class="px-8 py-6 border-t border-gray-200 bg-gray-50">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="text-gray-600 font-medium flex items-center">
                                <i class="fas fa-tags mr-2"></i>
                                Tags:
                            </span>
                            <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-4 py-2 rounded-full text-sm font-medium transition-colors duration-200">
                                Health
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
            </section>

            <!-- Sidebar -->
            <aside class="lg:col-span-1 space-y-8">

                <!-- Search Widget -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Search</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search articles..."
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Recent Posts Widget -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Recent Posts</h3>
                    <div class="space-y-4">
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
                </div>
        </div>

        <!-- Categories Widget -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">Categories</h3>
            <ul class="space-y-3">
                <li><a href="#" class="flex items-center justify-between text-gray-700 hover:text-blue-600 transition-colors">
                        <span>Health & Wellness</span>
                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs">12</span>
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
</style>
@endpush