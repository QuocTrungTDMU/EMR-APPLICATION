<!-- Footer Section -->
<footer class="bg-black text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 1200 600" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g stroke="currentColor" stroke-width="1" opacity="0.3">
                <path d="M0 300L200 100L400 300L600 100L800 300L1000 100L1200 300" />
                <path d="M0 400L150 200L300 400L450 200L600 400L750 200L900 400L1050 200L1200 400" />
                <path d="M0 500L100 300L200 500L300 300L400 500L500 300L600 500L700 300L800 500L900 300L1000 500L1100 300L1200 500" />
            </g>
        </svg>
    </div>

    <!-- Main Footer Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Column 1: Logo & Contact Info -->
            <div class="lg:col-span-1">
                <!-- Logo -->
                <div class="mb-6">
                    <a href="{{ url('/') }}" class="inline-block">
                        <img src="https://medik.wpenginepowered.com/wp-content/themes/medik/images/light-logo.png"
                            alt="Medik"
                            class="h-10 w-auto">
                    </a>
                </div>

                <!-- Contact Information -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-blue-400 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span class="text-gray-300 text-sm leading-relaxed">
                            No: 58 A, East Madison Street,<br>
                            Baltimore, MD, USA 4508
                        </span>
                    </div>

                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-blue-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <a href="tel:+9112345678" class="text-gray-300 text-sm hover:text-blue-400 transition-colors">
                            +91 12345678
                        </a>
                    </div>

                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-blue-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <a href="mailto:support@somemail.com" class="text-gray-300 text-sm hover:text-blue-400 transition-colors">
                            support@somemail.com
                        </a>
                    </div>
                </div>

                <!-- Social Media Icons -->
                <div class="flex space-x-2">
                    <a href="#" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 flex items-center justify-center rounded transition-colors">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 flex items-center justify-center rounded transition-colors">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-red-600 hover:bg-red-700 flex items-center justify-center rounded transition-colors">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-pink-600 hover:bg-pink-700 flex items-center justify-center rounded transition-colors">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z" />
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-700 hover:bg-blue-800 flex items-center justify-center rounded transition-colors">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Help -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6">Help</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/product/operation-scissors') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Scissors
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/glucometer-machine') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Glucometer
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/safe-disposable-gloves') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Disposable Gloves
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/cleaning-scissor') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Cleaning Scissor
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/smart-mask') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Smart Mask
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Support -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6">Support</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/product/plaster-machine') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Plaster machine
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/pedometer') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Pedometer
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/cleaning-scissor') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Cleaning Scissor
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/smart-mask') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Smart Mask
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/pedometer') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Pedometer
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Information -->
            <div>
                <h4 class="text-white font-bold text-lg mb-6">Information</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/product/operation-scissors') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Scissors
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/glucometer-machine') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Glucometer
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/safe-disposable-gloves') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Disposable Gloves
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/cleaning-scissor') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Cleaning Scissor
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/product/smart-mask') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">
                            Smart Mask
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="border-t border-gray-800 py-6">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center">
                <p class="text-gray-400 text-sm">
                    Copyright Powered by
                    <a href="https://themeforest.net/user/designthemes/portfolio"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-blue-400 hover:text-blue-300 transition-colors">
                        Designthemes
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 opacity-0 invisible z-50">
        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M5 15l7-7 7 7" />
        </svg>
    </button>
</footer>

<!-- JavaScript for Back to Top Button -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backToTopBtn = document.getElementById('back-to-top');

        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('opacity-0', 'invisible');
                backToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                backToTopBtn.classList.add('opacity-0', 'invisible');
                backToTopBtn.classList.remove('opacity-100', 'visible');
            }
        });

        // Smooth scroll to top
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>