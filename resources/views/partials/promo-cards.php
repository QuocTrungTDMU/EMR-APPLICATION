<!-- Promo Cards Section -->
<section class="py-8 bg-transparent">
    <div class="max-w-5xl mx-auto px-8">
        <div class="flex justify-center gap-6">
            <!-- Left Card - Hand Sanitizer -->
            <div class="relative rounded-lg overflow-hidden w-120 h-68 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('https://medik.wpenginepowered.com/wp-content/uploads/2020/05/feature-img-1.jpg?id=21488');">
                </div>

                <!-- Content -->
                <div class="relative z-10 w-full text-left p-6 animate-fade-in-left">
                    <h2 class="text-4xl font-black leading-tight mb-1" style="color: #2c5282; font-family: 'Titillium Web', sans-serif; font-weight: 900;">
                        Save 20%
                    </h2>
                    <h3 class="text-2xl font-normal text-white mb-3" style="font-family: 'Titillium Web', sans-serif; font-weight: 400;">
                        On Sanitizers
                    </h3>
                    <h4 class="text-base text-gray-800 leading-relaxed mb-4 font-medium" style="font-family: 'Roboto', sans-serif; font-weight: 500;">
                        99.9% Germ Production
                    </h4>
                    <a href="{{ url('/shop') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Shop Now
                    </a>
                </div>
            </div>

            <!-- Right Card - Protective Gear -->
            <div class="relative rounded-lg overflow-hidden w-120 h-68 flex items-center">
                <!-- Background Image -->
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('https://medik.wpenginepowered.com/wp-content/uploads/2020/05/feature-img-2.jpg?id=21487');">
                </div>

                <!-- Content -->
                <div class="relative z-10 w-full text-right p-6 animate-fade-in-right">
                    <h2 class="text-4xl font-black leading-tight mb-1" style="color: #2c5282; font-family: 'Titillium Web', sans-serif; font-weight: 900;">
                        15% Off
                    </h2>
                    <h3 class="text-2xl font-normal text-blue-600 mb-3" style="font-family: 'Titillium Web', sans-serif; font-weight: 400;">
                        Protective Gears
                    </h3>
                    <h4 class="text-base text-gray-800 leading-relaxed mb-4 font-medium" style="font-family: 'Roboto', sans-serif; font-weight: 500;">
                        Covid Protection
                    </h4>
                    <a href="{{ url('/shop') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS Animations -->
<style>
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-fade-in-left {
        opacity: 0;
        animation: fadeInLeft 2s ease-out forwards;
    }

    .animate-fade-in-right {
        opacity: 0;
        animation: fadeInRight 2s ease-out forwards;
    }

    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;700;900&family=Roboto:wght@300;400;500;700&display=swap');
</style>