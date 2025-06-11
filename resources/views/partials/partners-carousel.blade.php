<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<section class="w-full bg-[#fafdff] py-12" data-aos="fade-in">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white rounded-xl">
            <div class="relative">
                <!-- Swiper -->
                <div class="swiper partnersSwiper">
                    <div class="swiper-wrapper">
                        <!-- Logo 1 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-8.png" alt="Medical" class="max-h-50 object-contain" />
                            </div>
                        </div>
                        <!-- Logo 2 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-1-1.png" alt="Hippocratic" class="max-h-50 object-contain" />
                            </div>
                        </div>
                        <!-- Logo 3 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-2-1.png" alt="Aloha" class="max-h-50 object-contain" />
                            </div>
                        </div>
                        <!-- Logo 4 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-3-1.png" alt="M.Callahan" class="max-h-50 object-contain" />
                            </div>
                        </div>
                        <!-- Logo 5 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-4-1.png" alt="Client4" class="max-h-50 object-contain" />
                            </div>
                        </div>
                        <!-- Logo 6 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-5-1.png" alt="Client5" class="max-h-50 object-contain" />
                            </div>
                        </div>
                        <!-- Logo 7 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-6-1.png" alt="Client6" class="max-h-50 object-contain" />
                            </div>
                        </div>
                        <!-- Logo 8 -->
                        <div class="swiper-slide flex justify-center">
                            <div class="bg-white border border-gray-100 rounded-lg flex items-center justify-center w-66 h-44 transition hover:shadow-md">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/client-7.png" alt="Client7" class="max-h-50 object-contain" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center items-center mt-8 gap-8">
                    <button type="button" id="partners-prev" class="bg-gray-100 hover:bg-blue-200 rounded-full w-10 h-10 flex items-center justify-center shadow transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button type="button" id="partners-next" class="bg-gray-100 hover:bg-blue-200 rounded-full w-10 h-10 flex items-center justify-center shadow transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.partnersSwiper', {
            slidesPerView: 4,
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: '#partners-next',
                prevEl: '#partners-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 2
                },
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                }
            }
        });
    });
</script>