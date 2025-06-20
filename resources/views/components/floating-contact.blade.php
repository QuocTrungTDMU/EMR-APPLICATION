{{-- resources/views/components/floating-contact.blade.php - FIXED VERSION --}}

<!-- ✅ FLOATING CONTACT WIDGET - FIXED OVERLAP ISSUES -->
<div id="floating-contact" class="fixed bottom-6 right-6 z-[9999] flex flex-col space-y-3 pointer-events-none">

    <!-- Messenger Button -->
    <div class="relative pointer-events-auto">
        <a href="{{ $messengerLink ?? 'https://m.me/your-page-id' }}"
            target="_blank"
            class="group relative block transform transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 rounded-full animate-gentle-shake hover:animate-none"
            style="animation-delay: 0s;">

            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 rounded-full flex items-center justify-center shadow-lg hover:shadow-2xl transition-all duration-300 relative overflow-hidden backdrop-blur-sm">

                <!-- Glow Effect -->
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

                <!-- Ripple Effect Layer -->
                <div class="absolute inset-0 rounded-full bg-white opacity-0 scale-0 group-hover:opacity-10 group-hover:scale-100 transition-all duration-500"></div>

                <!-- Icon -->
                <i class="fab fa-facebook-messenger text-white text-xl sm:text-2xl relative z-10 drop-shadow-sm"></i>
            </div>

            <!-- Tooltip -->
            <div class="absolute right-20 top-1/2 -translate-y-1/2 bg-gray-900 bg-opacity-95 text-white px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:right-24 transition-all duration-300 pointer-events-none z-[10000] shadow-xl hidden sm:block backdrop-blur-sm">
                <span>{{ $messengerText ?? 'Chat với chúng tôi' }}</span>
                <!-- Arrow -->
                <div class="absolute left-full top-1/2 -translate-y-1/2 border-[6px] border-transparent border-l-gray-900 border-opacity-95"></div>
            </div>
        </a>
    </div>

    <!-- Zalo Button -->
    <div class="relative pointer-events-auto">
        <a href="{{ $zaloLink ?? 'https://zalo.me/your-zalo-id' }}"
            target="_blank"
            class="group relative block transform transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 rounded-full animate-gentle-shake hover:animate-none"
            style="animation-delay: 0.5s;">

            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 rounded-full flex items-center justify-center shadow-lg hover:shadow-2xl transition-all duration-300 relative overflow-hidden backdrop-blur-sm">

                <!-- Glow Effect -->
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-300 to-blue-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

                <!-- Ripple Effect Layer -->
                <div class="absolute inset-0 rounded-full bg-white opacity-0 scale-0 group-hover:opacity-10 group-hover:scale-100 transition-all duration-500"></div>

                <!-- Zalo Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 48 48">
                    <path fill="#2962ff" d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z"></path>
                    <path fill="#eee" d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z"></path>
                    <path fill="#2962ff" d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z"></path>
                    <path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"></path>
                    <path fill="#2962ff" d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z"></path>
                    <path fill="#2962ff" d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z"></path>
                </svg>
            </div>

            <!-- Tooltip -->
            <div class="absolute right-20 top-1/2 -translate-y-1/2 bg-gray-900 bg-opacity-95 text-white px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:right-24 transition-all duration-300 pointer-events-none z-[10000] shadow-xl hidden sm:block backdrop-blur-sm">
                <span>{{ $zaloText ?? 'Liên hệ Zalo' }}</span>
                <!-- Arrow -->
                <div class="absolute left-full top-1/2 -translate-y-1/2 border-[6px] border-transparent border-l-gray-900 border-opacity-95"></div>
            </div>
        </a>
    </div>

    <!-- Phone Button -->
    <div class="relative pointer-events-auto">
        <a href="tel:{{ $phoneNumber ?? '+84123456789' }}"
            class="group relative block transform transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-green-300 focus:ring-opacity-50 rounded-full animate-gentle-shake hover:animate-none"
            style="animation-delay: 1s;">

            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 rounded-full flex items-center justify-center shadow-lg hover:shadow-2xl transition-all duration-300 relative overflow-hidden backdrop-blur-sm">

                <!-- Glow Effect -->
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-green-400 to-green-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

                <!-- Ripple Effect Layer -->
                <div class="absolute inset-0 rounded-full bg-white opacity-0 scale-0 group-hover:opacity-10 group-hover:scale-100 transition-all duration-500"></div>

                <!-- Phone Icon -->
                <i class="fas fa-phone text-white text-xl sm:text-2xl relative z-10 drop-shadow-sm"></i>
            </div>

            <!-- Tooltip -->
            <div class="absolute right-20 top-1/2 -translate-y-1/2 bg-gray-900 bg-opacity-95 text-white px-4 py-2 rounded-lg text-sm font-medium whitespace-nowrap opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:right-24 transition-all duration-300 pointer-events-none z-[10000] shadow-xl hidden sm:block backdrop-blur-sm">
                <span>{{ $phoneText ?? 'Gọi ngay: 0123 456 789' }}</span>
                <!-- Arrow -->
                <div class="absolute left-full top-1/2 -translate-y-1/2 border-[6px] border-transparent border-l-gray-900 border-opacity-95"></div>
            </div>
        </a>
    </div>

    <!-- Back to Top Button (Optional) -->
    <div class="relative pointer-events-auto">
        <button id="backToTop"
            class="group relative hidden transform transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50 rounded-full">

            <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 rounded-full flex items-center justify-center shadow-lg hover:shadow-2xl transition-all duration-300 relative overflow-hidden backdrop-blur-sm">

                <!-- Glow Effect -->
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-gray-500 to-gray-600 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>

                <!-- Arrow Up Icon -->
                <i class="fas fa-chevron-up text-white text-lg sm:text-xl relative z-10 drop-shadow-sm"></i>

            </div>
        </button>
    </div>

</div>

{{-- ✅ ENHANCED JAVASCRIPT với Overlap Prevention --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactWidget = document.getElementById('floating-contact');
        const contactBtns = contactWidget?.querySelectorAll('a, button');
        const backToTopBtn = document.getElementById('backToTop');

        if (!contactWidget) return;

        // ✅ PREVENT OVERLAP với Footer và Elements khác
        function checkOverlap() {
            const footer = document.querySelector('footer');
            const navbar = document.querySelector('nav');
            const windowHeight = window.innerHeight;
            const scrollTop = window.pageYOffset;

            if (footer) {
                const footerRect = footer.getBoundingClientRect();
                const widgetRect = contactWidget.getBoundingClientRect();

                // Nếu footer đang visible và gần widget
                if (footerRect.top < windowHeight && footerRect.top < widgetRect.bottom + 20) {
                    contactWidget.style.bottom = `${windowHeight - footerRect.top + 20}px`;
                } else {
                    contactWidget.style.bottom = '1.5rem';
                }
            }

            // ✅ Hide widget khi scroll near top
            if (scrollTop < 100) {
                contactWidget.classList.add('opacity-60', 'scale-95');
            } else {
                contactWidget.classList.remove('opacity-60', 'scale-95');
            }

            // ✅ Show/Hide Back to Top button
            if (backToTopBtn) {
                if (scrollTop > 300) {
                    backToTopBtn.classList.remove('hidden');
                    backToTopBtn.classList.add('animate-slide-in-up');
                } else {
                    backToTopBtn.classList.add('hidden');
                }
            }
        }

        // ✅ ENHANCED CLICK RIPPLE EFFECT
        contactBtns?.forEach((btn, index) => {
            btn.addEventListener('click', function(e) {
                const circle = this.querySelector('div');
                if (!circle) return;

                const rect = circle.getBoundingClientRect();

                // Create ripple element
                const ripple = document.createElement('span');
                const size = Math.max(circle.clientWidth, circle.clientHeight);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                // Apply Tailwind classes for ripple
                ripple.className = 'absolute rounded-full bg-white opacity-30 pointer-events-none animate-ping';
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.animationDuration = '0.6s';

                // Remove existing ripples
                const existingRipples = circle.querySelectorAll('.animate-ping');
                existingRipples.forEach(r => r.remove());

                circle.appendChild(ripple);

                // Remove ripple after animation
                setTimeout(() => {
                    if (ripple.parentNode) {
                        ripple.remove();
                    }
                }, 600);

                // Analytics
                console.log('Contact button clicked:', ['Messenger', 'Zalo', 'Phone', 'Back to Top'][index]);
            });
        });

        // ✅ SCROLL EVENT LISTENERS
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            checkOverlap();

            // Clear previous timeout
            clearTimeout(scrollTimeout);

            // Reset widget position after scroll stops
            scrollTimeout = setTimeout(() => {
                contactWidget.classList.remove('opacity-60', 'scale-95');
            }, 150);
        }, {
            passive: true
        });

        // ✅ RESIZE EVENT LISTENER
        window.addEventListener('resize', checkOverlap, {
            passive: true
        });

        // ✅ BACK TO TOP FUNCTIONALITY
        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // ✅ INITIAL CHECK
        checkOverlap();

        // ✅ INTERSECTION OBSERVER cho better performance
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    contactWidget.classList.add('opacity-100');
                    contactWidget.classList.remove('opacity-0');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        // Observe main content
        const mainContent = document.querySelector('main');
        if (mainContent) {
            observer.observe(mainContent);
        }
    });
</script>