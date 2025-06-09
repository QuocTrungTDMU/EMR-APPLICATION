<!-- SwiperJS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<section class="w-screen bg-[#d6f3fd] py-20 flex flex-col items-center justify-center relative overflow-hidden">

    <span class="absolute top-12 left-1/2 -translate-x-1/2 opacity-20 select-none pointer-events-none z-0">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
            <rect x="20" y="0" width="8" height="48" rx="4" fill="#1c7ca7" />
            <rect x="0" y="20" width="48" height="8" rx="4" fill="#1c7ca7" />
        </svg>
    </span>
    <!-- Tiêu đề và mô tả -->
    <div class="relative z-10 mb-2" data-aos="fade-in">
        <h2 class="text-3xl md:text-4xl font-bold text-[#153B4B] text-center mb-2" style="font-family:'Titillium Web',sans-serif;">
            Our Client Say!
        </h2>
        <p class="text-base text-black text-center" style="font-family:'Roboto',sans-serif;">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry
        </p>
    </div>
    <!-- Swiper Slider -->
    <div class="relative w-full flex justify-center mt-12" data-aos="fade-in">
        <div class="w-full max-w-3xl px-2">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide flex justify-center">
                        <div class="relative bg-white rounded-2xl px-8 py-10 w-full flex flex-col items-center">
                            <!-- Quote icon mờ -->
                            <span class="absolute left-8 top-8 opacity-10 text-7xl select-none pointer-events-none z-0">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                                    <text x="0" y="40" font-size="48" fill="#153B4B">“</text>
                                </svg>
                            </span>
                            <!-- Author -->
                            <div class="flex flex-col items-center mb-4 z-10">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/team-1.jpg" alt="Cute Girl" class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-md mb-2">
                                <span class="font-bold text-lg text-[#153B4B]">Cute Girl</span>
                                <span class="text-gray-500 text-sm">Designation</span>
                            </div>
                            <!-- Nội dung -->
                            <blockquote class="relative z-10 text-center text-black text-base leading-relaxed" style="font-family:'Roboto',sans-serif;">
                                Lorem Ipsum is simply dummy text of the typesetting and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.
                            </blockquote>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide flex justify-center">
                        <div class="relative bg-white rounded-2xl px-8 py-10 w-full flex flex-col items-center">
                            <span class="absolute left-8 top-8 opacity-10 text-7xl select-none pointer-events-none z-0">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                                    <text x="0" y="40" font-size="48" fill="#153B4B">“</text>
                                </svg>
                            </span>
                            <div class="flex flex-col items-center mb-4 z-10">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/07/author5.jpg" alt="Team Expert" class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-md mb-2">
                                <span class="font-bold text-lg text-[#153B4B]">Team Expert</span>
                                <span class="text-gray-500 text-sm">Designation</span>
                            </div>
                            <blockquote class="relative z-10 text-center text-black text-base leading-relaxed" style="font-family:'Roboto',sans-serif;">
                                Lorem Ipsum is simply dummy text of the typesetting and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.
                            </blockquote>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide flex justify-center">
                        <div class="relative bg-white rounded-2xl shadow-2xl px-8 py-10 w-full flex flex-col items-center">
                            <span class="absolute left-8 top-8 opacity-10 text-7xl select-none pointer-events-none z-0">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                                    <text x="0" y="40" font-size="48" fill="#153B4B">“</text>
                                </svg>
                            </span>
                            <div class="flex flex-col items-center mb-4 z-10">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/07/team2.jpg" alt="Cute Girl" class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-md mb-2">
                                <span class="font-bold text-lg text-[#153B4B]">Cute Girl</span>
                                <span class="text-gray-500 text-sm">Designation</span>
                            </div>
                            <blockquote class="relative z-10 text-center text-black text-base leading-relaxed" style="font-family:'Roboto',sans-serif;">
                                Lorem Ipsum is simply dummy text of the typesetting and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a book.
                            </blockquote>
                        </div>
                    </div>
                </div>
                <!-- Navigation buttons -->
                <div class="swiper-button-prev !left-0 !top-1/2 !-translate-y-1/2 !bg-blue-600 hover:!bg-blue-700 !text-white !rounded !px-3 !py-2 !shadow-lg !flex !items-center !justify-center !transition-all !duration-200 after:!content-['']">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                <div class="swiper-button-next !right-0 !top-1/2 !-translate-y-1/2 !bg-blue-600 hover:!bg-blue-700 !text-white !rounded !px-3 !py-2 !shadow-lg !flex !items-center !justify-center !transition-all !duration-200 after:!content-['']">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // Responsive if you want more than 1 slide on large screens
        breakpoints: {
            1024: {
                slidesPerView: 1,
            }
        }
    });
</script>