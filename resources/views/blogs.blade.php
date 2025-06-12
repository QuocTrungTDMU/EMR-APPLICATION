@extends('layouts.app')

@section('title', 'Blogs - Medik')

@section('content')

<section class="relative text-center">
    <!-- Background Image -->
    <!-- Overlay (tùy chọn để làm tối background) -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-1" style="opacity: 0.5 !important;"></div>
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed"
        style="background-image: url('http://medik.wpenginepowered.com/wp-content/uploads/2020/02/breadcrumb-bg.jpg');">
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4 py-16 md:py-10">
        <!-- Main Title -->
        <div class="mb-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Blogs</h1>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center justify-center space-x-2 text-white" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                Home
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-300">Blogs</span>
        </nav>
    </div>
</section>

<!-- Main Blog Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Sidebar -->
            <aside class="lg:w-1/4 order-2 lg:order-1">
                <!-- Categories Widget -->
                <div class="bg-gray-50 shadow-custom-blue overflow-hidden mb-8">
                    <!-- Header màu xanh với góc bo -->
                    <div class="bg-[#076cec] px-6 py-3 rounded-t-sm rounded-b-sm">
                        <h3 class="text-lg font-semibold text-white">Categories</h3>
                    </div>

                    <!-- Categories List với nền xám nhạt -->
                    <div class="bg-gray-50 px-6 py-4">
                        <ul class="space-y-4">
                            @forelse($categories as $index => $category)
                            <li class="flex items-center justify-between py-2 {{ $index < count($categories) - 1 ? 'border-b-2 border-gray-300 border-dotted' : '' }}">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                    <a href="{{ route('blogs.category', $category['slug']) }}" class="text-gray-600 hover:text-cyan-400 transition-colors text-base">{{ $category['name'] }}</a>
                                </div>
                                <span class="text-gray-400 text-base">({{ $category['count'] }})</span>
                            </li>
                            @empty
                            <li class="flex items-center justify-between py-2 border-b-2 border-gray-300 border-dotted">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                    <a href="#" class="text-cyan-400 hover:text-cyan-500 transition-colors text-base">General</a>
                                </div>
                                <span class="text-gray-400 text-base">(0)</span>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Instagram Feed Widget -->
                <div class="w-full max-w-sm">
                    <!-- Header màu xanh -->
                    <div class="bg-[#076cec] px-4 py-3 rounded-t-sm rounded-b-sm">
                        <h3 class="text-white font-medium text-base">Instagram Feed</h3>
                    </div>

                    <!-- Khoảng cách padding màu xám nhạt -->
                    <div class="bg-gray-100 p-4">
                        <!-- Instagram Grid 3x2 -->
                        <div class="grid grid-cols-3 gap-1">
                            <!-- Row 1 -->
                            <!-- Instagram Image 1 -->
                            <a href="https://www.instagram.com/p/CAfPGsmF7MD/" target="_blank" class="block aspect-square overflow-hidden">
                                <img src="https://medik.wpengine.com/wp-content/uploads/sb-instagram-feed-images/100533134_181605023298077_1616725183391105110_nfull.jpg"
                                    alt="Medical hands with gloves"
                                    class="w-full h-full object-cover">
                            </a>

                            <!-- Instagram Image 2 -->
                            <a href="https://www.instagram.com/p/CAfPEnelPOx/" target="_blank" class="block aspect-square overflow-hidden">
                                <img src="https://medik.wpengine.com/wp-content/uploads/sb-instagram-feed-images/99002087_136008501388747_8370486827739648924_nfull.jpg"
                                    alt="Hand sanitizer bottle"
                                    class="w-full h-full object-cover">
                            </a>

                            <!-- Instagram Image 3 -->
                            <a href="https://www.instagram.com/p/CAfOwJWFJK1/" target="_blank" class="block aspect-square overflow-hidden">
                                <img src="https://medik.wpengine.com/wp-content/uploads/sb-instagram-feed-images/100920625_2520728114694919_5428527777666587039_nfull.jpg"
                                    alt="Virus bacteria illustration"
                                    class="w-full h-full object-cover">
                            </a>

                            <!-- Row 2 -->
                            <!-- Instagram Image 4 -->
                            <a href="https://www.instagram.com/p/CAfOuXklFhe/" target="_blank" class="block aspect-square overflow-hidden">
                                <img src="https://medik.wpengine.com/wp-content/uploads/sb-instagram-feed-images/98453711_103617851319635_6863408150167761692_nfull.jpg"
                                    alt="Hand sanitizer bottle"
                                    class="w-full h-full object-cover">
                            </a>

                            <!-- Instagram Image 5 -->
                            <a href="https://www.instagram.com/p/CAfMtt2FSLc/" target="_blank" class="block aspect-square overflow-hidden">
                                <img src="https://medik.wpengine.com/wp-content/uploads/sb-instagram-feed-images/100954451_252545935993937_1004786781914036111_nfull.jpg"
                                    alt="Vaccine injection"
                                    class="w-full h-full object-cover">
                            </a>

                            <!-- Instagram Image 6 -->
                            <a href="https://www.instagram.com/p/CAfMrkZF_Z5/" target="_blank" class="block aspect-square overflow-hidden">
                                <img src="https://medik.wpengine.com/wp-content/uploads/sb-instagram-feed-images/100699570_2706796279604108_1893177645237347413_nfull.jpg"
                                    alt="Medical test tubes"
                                    class="w-full h-full object-cover">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Hot Deal Widget -->
                <div class="bg-white rounded-lg shadow-md p-6 mt-8">
                    <h3 class="text-xl font-bold text-blue-600 mb-6 border-b-2 border-gray-300 pb-3">Hot Deal</h3>
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/shop-5-13-1000x1000.jpg"
                                alt="Liquid Sanitizer" class="w-full h-48 object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-20 rounded-lg"></div>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Liquid Sanitizer</h4>
                        <div class="text-2xl font-bold text-blue-600 mb-2">₹50.00</div>
                        <div class="flex justify-center items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                        </div>
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                            Quick View
                        </button>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="lg:w-3/4 order-1 lg:order-2">
                <!-- Blog Posts Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-12" data-aos="fade-up">
                    @forelse($paginatedPosts as $post)
                    <!-- Blog Post từ API -->
                    <div class="bg-white rounded-xl shadow border border-gray-300 overflow-hidden flex flex-col max-w-sm mx-auto">
                        <!-- Ảnh blog -->
                        <a href="{{ route('blogs.show', $post['slug']) }}" class="block">
                            <img src="{{ $post['image'] ?? 'https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-4-6.jpg' }}"
                                alt="{{ $post['title'] }}"
                                class="w-full h-48 object-cover">
                        </a>
                        <!-- Meta: ngày và comment -->
                        <div class="flex items-center justify-between px-4 py-2 border-b-2 border-gray-100 bg-white">
                            <div class="flex items-center gap-2 text-gray-500 text-base">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                    <line x1="16" x2="16" y1="2" y2="6"></line>
                                    <line x1="8" x2="8" y1="2" y2="6"></line>
                                    <line x1="3" x2="21" y1="10" y2="10"></line>
                                </svg>
                                <span>{{ $post['formatedDate'] ?? 'May 16, 2020' }}</span>
                            </div>
                            <span class="mx-4 h-5 border-l border-gray-300"></span>
                            <div class="flex items-center gap-2 text-gray-500 text-base">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                </svg>
                                <span>{{ $post['readTime'] ?? '1' }} min read</span>
                            </div>
                        </div>
                        <!-- Nội dung -->
                        <div class="p-5 flex flex-col flex-1">
                            <h2 class="text-xl font-semibold mb-2">
                                <a href="{{ route('blogs.show', $post['slug']) }}" class="hover:text-blue-600 transition">{{ $post['title'] }}</a>
                            </h2>
                            <p class="text-gray-500 text-base mb-4">
                                {{ $post['excerpt'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tincidunt nunc lorem, nec faucibus mi facilisis eget...' }}
                            </p>
                            <!-- Tags -->
                            <div class="flex items-center gap-2 text-base mb-4">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 12H4" />
                                </svg>
                                <span class="text-blue-600">{{ $post['postCategory'] ?? 'General' }}</span>
                                @if(isset($post['author']['name']))
                                <span class="text-gray-400">,</span>
                                <span class="text-blue-600">{{ $post['author']['name'] }}</span>
                                @endif
                            </div>
                            <!-- Button -->
                            <a href="{{ route('blogs.show', $post['slug']) }}"
                                class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl px-6 py-3 mt-auto shadow-lg shadow-blue-500/20 transition-all duration-200">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @empty
                    <!-- Fallback - 1 blog post mẫu khi không có dữ liệu -->
                    <div class="bg-white rounded-xl shadow border border-gray-300 overflow-hidden flex flex-col max-w-sm mx-auto">
                        <a href="#" class="block">
                            <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-4-6.jpg"
                                alt="Sample Post"
                                class="w-full h-48 object-cover">
                        </a>
                        <div class="flex items-center justify-between px-4 py-2 border-b-2 border-gray-100 bg-white">
                            <div class="flex items-center gap-2 text-gray-500 text-base">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                    <line x1="16" x2="16" y1="2" y2="6"></line>
                                    <line x1="8" x2="8" y1="2" y2="6"></line>
                                    <line x1="3" x2="21" y1="10" y2="10"></line>
                                </svg>
                                <span>{{ date('M d, Y') }}</span>
                            </div>
                            <span class="mx-4 h-5 border-l border-gray-300"></span>
                            <div class="flex items-center gap-2 text-gray-500 text-base">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                </svg>
                                <span>2 min read</span>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <h2 class="text-xl font-semibold mb-2">
                                <a href="#" class="hover:text-blue-600 transition">No Posts Available</a>
                            </h2>
                            <p class="text-gray-500 text-base mb-4">
                                Blog posts will appear here when data is available from the API.
                            </p>
                            <div class="flex items-center gap-2 text-base mb-4">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M20 12H4" />
                                </svg>
                                <span class="text-blue-600">General</span>
                            </div>
                            <a href="#"
                                class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl px-6 py-3 mt-auto shadow-lg shadow-blue-500/20 transition-all duration-200">
                                Read More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if(isset($totalPages) && $totalPages > 1)
                <div class="flex justify-center items-center space-x-2" data-aos="fade-up">
                    <nav class="flex items-center space-x-1">
                        @if($page > 1)
                        <a href="{{ request()->url() }}?page={{ $page - 1 }}" class="inline-flex items-center px-4 py-2 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50 hover:text-gray-700 transition-colors">
                            Previous
                        </a>
                        @endif

                        @for($i = 1; $i <= $totalPages; $i++)
                            @if($i==$page)
                            <span class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-blue-600 border border-blue-600 rounded cursor-default">
                            {{ $i }}
                            </span>
                            @else
                            <a href="{{ request()->url() }}?page={{ $i }}" class="inline-flex items-center px-4 py-2 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50 hover:text-gray-700 transition-colors">
                                {{ $i }}
                            </a>
                            @endif
                            @endfor

                            @if($page < $totalPages)
                                <a href="{{ request()->url() }}?page={{ $page + 1 }}" class="inline-flex items-center px-4 py-2 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-50 hover:text-gray-700 transition-colors">
                                Next
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                </a>
                                @endif
                    </nav>
                </div>
                @else
                <!-- Fallback pagination khi không có dữ liệu -->
                <div class="flex justify-center items-center space-x-2" data-aos="fade-up">
                    <nav class="flex items-center space-x-1">
                        <span class="inline-flex items-center px-4 py-2 text-base font-medium text-white bg-blue-600 border border-blue-600 rounded cursor-default">
                            1
                        </span>
                    </nav>
                </div>
                @endif
            </main>

        </div>
    </div>
</section>

@endsection

<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .shadow-custom-blue {
        box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1), 0 2px 4px -1px rgba(59, 130, 246, 0.06);
    }
</style>