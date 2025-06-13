<section class="py-16 bg-white" data-aos="fade-in">
    <div class="container mx-auto px-4">

        <!-- SECTION HEADER -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                Our Latest News
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Lorem ipsum is simply dummy text of the printing and typesetting industry
            </p>
        </div>

        <!-- CARDS GRID-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 auto-rows-fr">

            @forelse($latestNews ?? [] as $news)
            <!-- CARD với Equal Height Structure -->
            <article class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden flex flex-col h-full hover:shadow-xl transition-shadow duration-300">
                <!-- Image -->
                <div class="h-48 overflow-hidden flex-shrink-0">
                    <img src="{{ $news['image'] ?? 'https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-4-6.jpg' }}"
                        alt="{{ $news['title'] ?? 'News Image' }}"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>

                <!-- Content -->
                <div class="p-6 flex flex-col flex-1">
                    <!-- Meta info -->
                    <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4 flex-shrink-0">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-blue-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                <line x1="16" x2="16" y1="2" y2="6"></line>
                                <line x1="8" x2="8" y1="2" y2="6"></line>
                                <line x1="3" x2="21" y1="10" y2="10"></line>
                            </svg>
                            <span>{{ $news['formatedDate'] ?? 'January 18, 2019' }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-blue-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                            <span>0 Comments</span>
                        </div>
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-800 mb-3 leading-tight flex-shrink-0">
                        <a href="{{ route('blogs.show', $news['slug']) }}" class="hover:text-blue-600 transition-colors line-clamp-2">
                            {{ $news['title'] ?? 'News Title' }}
                        </a>
                    </h3>

                    <!-- Description - Expandable Area -->
                    <div class="flex-1 mb-4">
                        <p class="text-gray-600 leading-relaxed line-clamp-3">
                            {{ \Str::limit($news['excerpt'] ?? 'Lorem ipsum dolor sit amet, consectetur ur adipiscing elit.', 120) }}
                        </p>
                    </div>

                    <!-- BOTTOM SECTION - Stick to Bottom -->
                    <div class="mt-auto space-y-4">
                        <!-- Tags -->
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-blue-600 font-medium">{{ $news['postCategory'] ?? 'Blog' }}</span>
                        </div>

                        <!-- BUTTON exact match -->
                        <a href="{{ route('blogs.show', $news['slug']) }}"
                            class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-6 py-3 transition-colors duration-200 shadow-sm">
                            Read More
                            <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            @empty
            <!-- FALLBACK Static Cards -->
            <article class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden flex flex-col h-full">
                <div class="h-48 overflow-hidden flex-shrink-0">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/blog-4-6.jpg"
                        alt="Hospital infectious waste"
                        class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center text-sm text-gray-500 mb-4 space-x-4">
                        <span><i class="fas fa-calendar text-blue-500 mr-2"></i>January 18, 2019</span>
                        <span><i class="fas fa-comments text-blue-500 mr-2"></i>0 Comments</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Hospital infectious waste</h3>
                    <div class="flex-1">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Lorem ipsum dolor sit amet, consectetur ur adipiscing elit. Proin tincidunt nunc lorem, nec faucibus mi facilisis eget.
                        </p>
                    </div>
                    <div class="mt-auto space-y-4">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-tag text-blue-600"></i>
                            <span class="text-blue-600 font-medium">Blog</span>
                            <span class="text-gray-400">,</span>
                            <span class="text-blue-600 font-medium">Message</span>
                        </div>
                        <button class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-6 py-3 transition-colors duration-200 shadow-sm">
                            Read More <i class="fas fa-chevron-right ml-3"></i>
                        </button>
                    </div>
                </div>
            </article>

            <!-- More static cards... -->
            @endforelse
        </div>
    </div>
</section>

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush