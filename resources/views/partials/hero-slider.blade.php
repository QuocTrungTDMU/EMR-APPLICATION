<!-- Hero Section - Safety Masks (Single Slide) -->
<section class="relative w-full h-[730px] md:h-[500px] sm:h-[450px] overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('https://medik.wpengine.com/wp-content/uploads/2020/05/shop-slider-bg.jpg');">
        <!-- Sky Blue Gradient Overlay -->

    </div>

    <!-- Content positioned left side -->
    <div class="relative z-10 flex items-center h-full">
        <div class="max-w-7xl mx-auto px-4 md:px-8 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left Content -->
                <div class="max-w-lg text-left">
                    <!-- Category Label -->
                    <div class="mb-4 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <span class="text-gray-800 font-semibold text-2xl md:text-3xl tracking-wide">Safety Masks</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 animate-slide-left" style="animation-delay: 0.4s;">
                        <span class="text-white drop-shadow-lg">15% Off.</span>
                        <span class="text-gray-800">Hurry</span>
                    </h1>

                    <!-- Description -->
                    <p class="text-white text-lg md:text-xl mb-8 max-w-md leading-relaxed animate-fade-in-up" style="animation-delay: 0.6s;">
                        Get the best Grade A safety mask for you & your loved ones protection.
                    </p>

                    <!-- CTA Button -->
                    <div class="animate-fade-in-up" style="animation-delay: 0.8s;">
                        <a href="{{ url('/product/digital-pressure-machine') }}"
                            class="inline-block bg-white text-gray-800 font-bold text-base px-10 py-4 rounded border-3 border-white hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all duration-300 transform hover:scale-105">
                            Starts from $0.99
                        </a>
                    </div>
                </div>

                <!-- Right Image Space -->
                <div class="hidden lg:flex justify-end items-center animate-slide-right" style="animation-delay: 1s;">
                    <div class="relative">
                        <img src="https://medik.wpengine.com/wp-content/uploads/2020/05/n95-mask.png"
                            alt=""
                            class="w-full max-w-2xl h-auto object-contain drop-shadow-2xl transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS Animations -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideLeft {
        from {
            opacity: 0;
            transform: translateX(-100px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideRight {
        from {
            opacity: 0;
            transform: translateX(100px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-fade-in-up {
        opacity: 0;
        animation: fadeInUp 1s ease-out forwards;
    }

    .animate-slide-left {
        opacity: 0;
        animation: slideLeft 1.2s ease-out forwards;
    }

    .animate-slide-right {
        opacity: 0;
        animation: slideRight 1.2s ease-out forwards;
    }
</style>