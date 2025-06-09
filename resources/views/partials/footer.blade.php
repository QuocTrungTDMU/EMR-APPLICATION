<footer class="bg-black text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10 pointer-events-none select-none">
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
        <!-- Desktop: 4 cột, Mobile: Accordion -->
        <div class="hidden md:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Cột 1: Logo & Contact -->
            <div>
                <div class="mb-6">
                    <a href="{{ url('/') }}" class="inline-block">
                        <img src="https://medik.wpenginepowered.com/wp-content/themes/medik/images/light-logo.png"
                            alt="Medik"
                            class="h-10 w-auto">
                    </a>
                </div>
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
                <div class="flex space-x-2">
                    <!-- Social Icons giữ nguyên -->
                    <!-- ... -->
                </div>
            </div>
            <!-- Cột 2: Help -->
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
            <!-- Cột 3: Support -->
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
            <!-- Cột 4: Information -->
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

        <!-- Mobile: Accordion -->
        <div class="md:hidden space-y-3">
            <!-- Cột 1: Logo & Contact -->
            <div class="border-b border-gray-700">
                <button type="button" class="w-full flex justify-between items-center py-4 text-left font-bold text-lg text-white accordion-toggle">
                    <span>Contact & Social</span>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content hidden pb-4">
                    <div class="mb-6">
                        <a href="{{ url('/') }}" class="inline-block">
                            <img src="https://medik.wpenginepowered.com/wp-content/themes/medik/images/light-logo.png"
                                alt="Medik"
                                class="h-10 w-auto">
                        </a>
                    </div>
                    <div class="space-y-4 mb-6">
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
                    <div class="flex space-x-2">
                        <!-- Social Icons giữ nguyên -->
                        <!-- ... -->
                    </div>
                </div>
            </div>
            <!-- Cột 2: Help -->
            <div class="border-b border-gray-700">
                <button type="button" class="w-full flex justify-between items-center py-4 text-left font-bold text-lg text-white accordion-toggle">
                    <span>Help</span>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="accordion-content hidden pb-4 space-y-3">
                    <li><a href="{{ url('/product/operation-scissors') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Scissors</a></li>
                    <li><a href="{{ url('/product/glucometer-machine') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Glucometer</a></li>
                    <li><a href="{{ url('/product/safe-disposable-gloves') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Disposable Gloves</a></li>
                    <li><a href="{{ url('/product/cleaning-scissor') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Cleaning Scissor</a></li>
                    <li><a href="{{ url('/product/smart-mask') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Smart Mask</a></li>
                </ul>
            </div>
            <!-- Cột 3: Support -->
            <div class="border-b border-gray-700">
                <button type="button" class="w-full flex justify-between items-center py-4 text-left font-bold text-lg text-white accordion-toggle">
                    <span>Support</span>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="accordion-content hidden pb-4 space-y-3">
                    <li><a href="{{ url('/product/plaster-machine') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Plaster machine</a></li>
                    <li><a href="{{ url('/product/pedometer') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Pedometer</a></li>
                    <li><a href="{{ url('/product/cleaning-scissor') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Cleaning Scissor</a></li>
                    <li><a href="{{ url('/product/smart-mask') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Smart Mask</a></li>
                    <li><a href="{{ url('/product/pedometer') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Pedometer</a></li>
                </ul>
            </div>
            <!-- Cột 4: Information -->
            <div class="border-b border-gray-700">
                <button type="button" class="w-full flex justify-between items-center py-4 text-left font-bold text-lg text-white accordion-toggle">
                    <span>Information</span>
                    <svg class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul class="accordion-content hidden pb-4 space-y-3">
                    <li><a href="{{ url('/product/operation-scissors') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Scissors</a></li>
                    <li><a href="{{ url('/product/glucometer-machine') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Glucometer</a></li>
                    <li><a href="{{ url('/product/safe-disposable-gloves') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Disposable Gloves</a></li>
                    <li><a href="{{ url('/product/cleaning-scissor') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Cleaning Scissor</a></li>
                    <li><a href="{{ url('/product/smart-mask') }}" class="text-gray-300 hover:text-blue-400 transition-colors text-sm">Smart Mask</a></li>
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

<!-- JavaScript cho accordion và back to top -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Accordion cho mobile
        const toggles = document.querySelectorAll('.accordion-toggle');
        toggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                toggles.forEach(other => {
                    if (other !== this) {
                        other.nextElementSibling.classList.add('hidden');
                        other.querySelector('svg').classList.remove('rotate-180');
                    }
                });
                const content = this.nextElementSibling;
                content.classList.toggle('hidden');
                this.querySelector('svg').classList.toggle('rotate-180');
            });
        });

        // Back to top
        const backToTopBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('opacity-0', 'invisible');
                backToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                backToTopBtn.classList.add('opacity-0', 'invisible');
                backToTopBtn.classList.remove('opacity-100', 'visible');
            }
        });
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>