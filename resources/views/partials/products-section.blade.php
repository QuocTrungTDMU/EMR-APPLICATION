<!-- SwiperJS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<section class="w-full bg-white py-10" data-aos="fade-in">
    <div class="max-w-7xl mx-auto flex flex-col items-center">
        <!-- Title -->
        <h2 class="text-4xl font-bold text-center mb-2">Our Products</h2>
        <p class="text-center text-gray-500 mb-8">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

        <!-- Tabs (Desktop) -->
        <div class="hidden md:flex w-full justify-center mb-8">
            <div class="bg-gray-100 rounded-lg p-1 flex relative">
                <!-- Tab: Medication (active) -->
                <button class="tab-button active relative flex flex-col items-center justify-center px-8 py-5 bg-white rounded-lg focus:outline-none z-10">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Medication.png" alt="Medication" class="w-14 h-14 mb-2">
                    <span class="text-blue-700 font-medium text-lg">Medication</span>
                </button>
                <!-- Tab: Drugs -->
                <button class="tab-button relative flex flex-col items-center justify-center px-8 py-5 hover:bg-blue-50 rounded-lg focus:outline-none" data-filter="drugs">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Drugs.png" alt="Drugs" class="w-14 h-14 mb-2">
                    <span class="text-gray-700 font-medium text-lg">Drugs</span>
                </button>
                <!-- Tab: Laboratory -->
                <button class="tab-button relative flex flex-col items-center justify-center px-8 py-5 hover:bg-blue-50 rounded-lg focus:outline-none">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Laboratory.png" alt="Laboratory" class="w-14 h-14 mb-2">
                    <span class="text-gray-700 font-medium text-lg">Laboratory</span>
                </button>
                <!-- Tab: Equipments -->
                <button class="tab-button relative flex flex-col items-center justify-center px-8 py-5 hover:bg-blue-50 rounded-lg focus:outline-none">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Equipments.png" alt="Equipments" class="w-14 h-14 mb-2">
                    <span class="text-gray-700 font-medium text-lg">Equipments</span>
                </button>
                <!-- Tab: Radiology -->
                <button class="tab-button relative flex flex-col items-center justify-center px-8 py-5 hover:bg-blue-50 rounded-lg focus:outline-none">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Radiology.png" alt="Radiology" class="w-14 h-14 mb-2">
                    <span class="text-gray-700 font-medium text-lg">Radiology</span>
                </button>
                <!-- Tab: Devices -->
                <button class="tab-button relative flex flex-col items-center justify-center px-8 py-5 hover:bg-blue-50 rounded-lg focus:outline-none">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Devices.png" alt="Devices" class="w-14 h-14 mb-2">
                    <span class="text-gray-700 font-medium text-lg">Devices</span>
                </button>
            </div>
        </div>

        <!-- Tabs (Mobile: Swiper Slider) -->
        <div class="md:hidden w-full mb-8">
            <div class="relative w-full flex flex-col items-center">
                <!-- Nút điều hướng slider -->
                <div class="flex justify-center gap-2 mb-4">
                    <button id="prevTab" class="bg-blue-100 hover:bg-blue-200 text-blue-700 rounded w-10 h-10 flex items-center justify-center">
                        <svg width="20" height="20" fill="currentColor">
                            <polygon points="13,5 7,10 13,15" />
                        </svg>
                    </button>
                    <button id="nextTab" class="bg-blue-600 hover:bg-blue-700 text-white rounded w-10 h-10 flex items-center justify-center">
                        <svg width="20" height="20" fill="currentColor">
                            <polygon points="7,5 13,10 7,15" />
                        </svg>
                    </button>
                </div>
                <!-- Swiper Slider Tabs -->
                <div class="swiper tabSwiper w-full max-w-[320px]">
                    <div class="swiper-wrapper">
                        <!-- Slide 1: Medication (active) -->
                        <div class="swiper-slide">
                            <div class="tab-button-mobile active flex flex-col items-center justify-center bg-blue-50 rounded-lg border-b-4 border-blue-300 py-4 px-2 mx-1 relative">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Medication.png" alt="Medication" class="w-12 h-12 mb-2">
                                <span class="text-blue-700 font-medium text-sm">Medication</span>
                            </div>
                        </div>
                        <!-- Slide 2: Drugs -->
                        <div class="swiper-slide">
                            <div class="tab-button-mobile flex flex-col items-center justify-center bg-white rounded-lg py-4 px-2 mx-1 relative">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Drugs.png" alt="Drugs" class="w-12 h-12 mb-2">
                                <span class="text-gray-700 font-medium text-sm">Drugs</span>
                            </div>
                        </div>
                        <!-- Slide 3: Laboratory -->
                        <div class="swiper-slide">
                            <div class="tab-button-mobile flex flex-col items-center justify-center bg-white rounded-lg py-4 px-2 mx-1 relative">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Laboratory.png" alt="Laboratory" class="w-12 h-12 mb-2">
                                <span class="text-gray-700 font-medium text-sm">Laboratory</span>
                            </div>
                        </div>
                        <!-- Slide 4: Equipments -->
                        <div class="swiper-slide">
                            <div class="tab-button-mobile flex flex-col items-center justify-center bg-white rounded-lg py-4 px-2 mx-1 relative">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Equipments.png" alt="Equipments" class="w-12 h-12 mb-2">
                                <span class="text-gray-700 font-medium text-sm">Equipments</span>
                            </div>
                        </div>
                        <!-- Slide 5: Radiology -->
                        <div class="swiper-slide">
                            <div class="tab-button-mobile flex flex-col items-center justify-center bg-white rounded-lg py-4 px-2 mx-1 relative">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Radiology.png" alt="Radiology" class="w-12 h-12 mb-2">
                                <span class="text-gray-700 font-medium text-sm">Radiology</span>
                            </div>
                        </div>
                        <!-- Slide 6: Devices -->
                        <div class="swiper-slide">
                            <div class="tab-button-mobile flex flex-col items-center justify-center bg-white rounded-lg py-4 px-2 mx-1 relative">
                                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2020/05/Devices.png" alt="Devices" class="w-12 h-12 mb-2">
                                <span class="text-gray-700 font-medium text-sm">Devices</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid 6 cột -->
        <div class="w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">

                <div class="product-card group bg-white rounded-xl sm:rounded-2xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 flex flex-col relative overflow-hidden min-h-[300px] sm:min-h-[320px] lg:min-h-[380px] shadow-lg hover:shadow-xl mx-2 sm:mx-0">

                    <!-- Product Image Container -->
                    <div class="relative w-full h-70 sm:h-56 lg:h-64 mb-3 sm:mb-6 lg:mb-9 overflow-hidden rounded-t-xl sm:rounded-t-2xl">
                        <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-1000x1000.jpg" alt="Vitamin C Tablet" class="w-full h-full object-cover">

                        <!-- Action Buttons -->
                        <div class="action-buttons absolute top-2 sm:top-3 left-2 sm:left-3 flex flex-col gap-2 sm:gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Add to Favorites">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Share">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                                </svg>
                            </button>
                            <button class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Quick View">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Tooltip -->
                        <div class="tooltip absolute top-2 sm:top-3 right-2 sm:right-3 bg-gray-800 text-white px-2 sm:px-3 lg:px-4 py-1 sm:py-2 rounded-lg text-xs sm:text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 font-medium">
                            Vitamin C Tablet
                        </div>
                    </div>

                    <!-- Content Container -->
                    <div class="flex flex-col items-center px-3 sm:px-4 lg:px-6 pb-4 sm:pb-6 lg:pb-8 flex-grow">
                        <div class="uppercase text-xs sm:text-sm text-gray-400 mb-2 sm:mb-3 font-semibold tracking-wider text-center">CAPSULES, MEDICINE, DRUGS</div>
                        <div class="font-bold text-base sm:text-lg mb-3 sm:mb-4 text-center text-gray-800">Vitamin C Tablet</div>

                        <!-- Stars -->
                        <div class="flex items-center mb-3 sm:mb-4">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 "></polygon>
                            </svg>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 "></polygon>
                            </svg>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 "></polygon>
                            </svg>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 "></polygon>
                            </svg>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 "></polygon>
                            </svg>
                        </div>

                        <div class="font-semibold text-blue-600 text-lg sm:text-xl mb-4 sm:mb-6">₹60.00</div>

                        <!-- Button -->
                        <button class="add-to-cart-btn bg-cyan-400 hover:bg-cyan-500 text-white font-bold rounded-full px-3 sm:px-4 py-2 transition-all duration-300 flex items-center justify-center min-w-[120px] sm:min-w-[150px] text-sm sm:text-base shadow-lg hover:shadow-xl">
                            <span class="add-text">ADD TO CART</span>
                            <svg class="cart-icon w-5 h-5 sm:w-6 sm:h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </button>
                    </div>
                </div>



                <!-- Product Card -->
                <div class="product-card group bg-white rounded-2xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 flex flex-col relative overflow-hidden min-h-[420px] shadow-lg hover:shadow-xl" data-tags="drugs,medicine,pills">

                    <!-- Product Image Container - CHỈ chứa ảnh, action buttons, tooltip -->
                    <div class="relative w-full h-70 mb-6 overflow-hidden rounded-t-2xl">
                        <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-1000x1000.jpg" alt="Vitamin C Tablet" class="w-full h-full object-cover">

                        <!-- Action Buttons -->
                        <div class="action-buttons absolute top-3 left-3 flex flex-col gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Add to Favorites">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Share">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Quick View">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Tooltip  -->
                        <div class="tooltip absolute top-3 right-3 bg-gray-800 text-white px-4 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 font-medium">
                            Vitamin C Tablet
                        </div>
                    </div>

                    <!-- Content Container  -->
                    <div class="flex flex-col items-center px-6 pb-8 flex-grow">
                        <div class="uppercase text-sm text-gray-400 mb-3 font-semibold tracking-wider">CAPSULES, MEDICINE, PILLS</div>
                        <div class="font-bold text-lg mb-4 text-center text-gray-800">Vitamin C Tablet</div>

                        <!-- Stars -->
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                        </div>

                        <div class="font-semibold text-blue-600 text-xl mb-6">₹60.00</div>

                        <!-- Button -->
                        <button class="add-to-cart-btn bg-cyan-400 hover:bg-cyan-500 text-white font-bold rounded-full px-4 py-2 transition-all duration-300 flex items-center justify-center min-w-[150px] text-base shadow-lg hover:shadow-xl">
                            <span class="add-text">ADD TO CART</span>
                            <svg class="cart-icon w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </button>
                    </div>
                </div>


                <!-- Product Card -->
                <div class="product-card group bg-white rounded-2xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 flex flex-col relative overflow-hidden min-h-[420px] shadow-lg hover:shadow-xl">

                    <!-- Product Image Container - CHỈ chứa ảnh, action buttons, tooltip -->
                    <div class="relative w-full h-70 mb-6 overflow-hidden rounded-t-2xl">
                        <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-1000x1000.jpg" alt="Vitamin C Tablet" class="w-full h-full object-cover">

                        <!-- Action Buttons -->
                        <div class="action-buttons absolute top-3 left-3 flex flex-col gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Add to Favorites">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Share">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Quick View">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Tooltip  -->
                        <div class="tooltip absolute top-3 right-3 bg-gray-800 text-white px-4 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 font-medium">
                            Vitamin C Tablet
                        </div>
                    </div>

                    <!-- Content Container  -->
                    <div class="flex flex-col items-center px-6 pb-8 flex-grow">
                        <div class="uppercase text-sm text-gray-400 mb-3 font-semibold tracking-wider">CAPSULES, MEDICINE, PILLS</div>
                        <div class="font-bold text-lg mb-4 text-center text-gray-800">Vitamin C Tablet</div>

                        <!-- Stars -->
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                        </div>

                        <div class="font-semibold text-blue-600 text-xl mb-6">₹60.00</div>

                        <!-- Button -->
                        <button class="add-to-cart-btn bg-cyan-400 hover:bg-cyan-500 text-white font-bold rounded-full px-4 py-2 transition-all duration-300 flex items-center justify-center min-w-[150px] text-base shadow-lg hover:shadow-xl">
                            <span class="add-text">ADD TO CART</span>
                            <svg class="cart-icon w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </button>
                    </div>
                </div>


                <!-- Product Card -->
                <div class="product-card group bg-white rounded-2xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 flex flex-col relative overflow-hidden min-h-[420px] shadow-lg hover:shadow-xl">

                    <!-- Product Image Container - CHỈ chứa ảnh, action buttons, tooltip -->
                    <div class="relative w-full h-70 mb-6 overflow-hidden rounded-t-2xl">
                        <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-1000x1000.jpg" alt="Vitamin C Tablet" class="w-full h-full object-cover">

                        <!-- Action Buttons -->
                        <div class="action-buttons absolute top-3 left-3 flex flex-col gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Add to Favorites">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Share">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Quick View">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Tooltip  -->
                        <div class="tooltip absolute top-3 right-3 bg-gray-800 text-white px-4 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 font-medium">
                            Vitamin C Tablet
                        </div>
                    </div>

                    <!-- Content Container  -->
                    <div class="flex flex-col items-center px-6 pb-8 flex-grow">
                        <div class="uppercase text-sm text-gray-400 mb-3 font-semibold tracking-wider">CAPSULES, MEDICINE, PILLS</div>
                        <div class="font-bold text-lg mb-4 text-center text-gray-800">Vitamin C Tablet</div>

                        <!-- Stars -->
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                        </div>

                        <div class="font-semibold text-blue-600 text-xl mb-6">₹60.00</div>

                        <!-- Button -->
                        <button class="add-to-cart-btn bg-cyan-400 hover:bg-cyan-500 text-white font-bold rounded-full px-4 py-2 transition-all duration-300 flex items-center justify-center min-w-[150px] text-base shadow-lg hover:shadow-xl">
                            <span class="add-text">ADD TO CART</span>
                            <svg class="cart-icon w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </button>
                    </div>
                </div>


                <!-- Product Card -->
                <div class="product-card group bg-white rounded-2xl border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 flex flex-col relative overflow-hidden min-h-[420px] shadow-lg hover:shadow-xl">

                    <!-- Product Image Container - CHỈ chứa ảnh, action buttons, tooltip -->
                    <div class="relative w-full h-70 mb-6 overflow-hidden rounded-t-2xl">
                        <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/01/5-15-1000x1000.jpg" alt="Vitamin C Tablet" class="w-full h-full object-cover">

                        <!-- Action Buttons -->
                        <div class="action-buttons absolute top-3 left-3 flex flex-col gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Add to Favorites">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Share">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                </svg>
                            </button>
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-200 shadow-lg" title="Quick View">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Tooltip  -->
                        <div class="tooltip absolute top-3 right-3 bg-gray-800 text-white px-4 py-2 rounded-lg text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 font-medium">
                            Vitamin C Tablet
                        </div>
                    </div>

                    <!-- Content Container  -->
                    <div class="flex flex-col items-center px-6 pb-8 flex-grow">
                        <div class="uppercase text-sm text-gray-400 mb-3 font-semibold tracking-wider">CAPSULES, MEDICINE, PILLS</div>
                        <div class="font-bold text-lg mb-4 text-center text-gray-800">Vitamin C Tablet</div>

                        <!-- Stars -->
                        <div class="flex items-center mb-4">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <polygon points="9.9,1.1 12.3,6.6 18.2,7.3 13.7,11.3 15,17.1 9.9,14.1 4.8,17.1 6.1,11.3 1.6,7.3 7.5,6.6 " />
                            </svg>
                        </div>

                        <div class="font-semibold text-blue-600 text-xl mb-6">₹60.00</div>

                        <!-- Button -->
                        <button class="add-to-cart-btn bg-cyan-400 hover:bg-cyan-500 text-white font-bold rounded-full px-4 py-2 transition-all duration-300 flex items-center justify-center min-w-[150px] text-base shadow-lg hover:shadow-xl">
                            <span class="add-text">ADD TO CART</span>
                            <svg class="cart-icon w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </button>
                    </div>
                </div>





                <!-- Lặp lại cho các cards khác... -->

            </div>
        </div>

    </div>
    </div>
</section>

<style>
    /* CSS cho round-out borders của tabs */
    .tab-button {
        position: relative;
    }

    .tab-button.active::before,
    .tab-button.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        width: 20px;
        height: 20px;
        background: radial-gradient(circle at top left, transparent 20px, #f3f4f6 20px);
    }

    .tab-button.active::before {
        left: -20px;
        background: radial-gradient(circle at top right, transparent 20px, #f3f4f6 20px);
    }

    .tab-button.active::after {
        right: -20px;
        background: radial-gradient(circle at top left, transparent 20px, #f3f4f6 20px);
    }

    /* Mobile tabs */
    .tab-button-mobile.active::before,
    .tab-button-mobile.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        width: 15px;
        height: 15px;
    }

    .tab-button-mobile.active::before {
        left: -15px;
        background: radial-gradient(circle at top right, transparent 15px, #eff6ff 15px);
    }

    .tab-button-mobile.active::after {
        right: -15px;
        background: radial-gradient(circle at top left, transparent 15px, #eff6ff 15px);
    }

    /* Product card hover effects */
    .product-card {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .product-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    /* Cart button states */
    .add-to-cart-btn .add-text {
        display: inline-block;
    }

    .add-to-cart-btn .cart-icon {
        display: none;
    }

    .add-to-cart-btn.cart-added .add-text {
        display: none;
    }

    .add-to-cart-btn.cart-added .cart-icon {
        display: inline-block;
    }

    /* Tooltip styling */
    .tooltip {
        white-space: nowrap;
        pointer-events: none;
    }
</style>

<script>
    // Khởi tạo Swiper cho tabs trên mobile
    const tabSwiper = new Swiper('.tabSwiper', {
        slidesPerView: 2,
        spaceBetween: 10,
        centeredSlides: false,
        allowTouchMove: true,
        navigation: {
            nextEl: '#nextTab',
            prevEl: '#prevTab',
        },
    });

    // Xử lý click tabs trên desktop
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Xử lý click nút Add to Cart
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('cart-added');
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function để lọc sản phẩm theo tags - ĐÃ SỬA LỖI
        function filterProductsByTag(filterTag) {
            const allProducts = document.querySelectorAll('.product-card');
            let visibleCount = 0;

            allProducts.forEach((product, index) => {
                // KIỂM TRA data-tags có tồn tại không
                const productTags = product.dataset.tags;

                // Sửa lỗi: Kiểm tra productTags trước khi gọi includes
                const shouldShow = filterTag === 'all' || (productTags && productTags.includes(filterTag));

                if (shouldShow) {
                    // Hiển thị sản phẩm với animation
                    product.style.display = 'block';
                    product.style.opacity = '0';
                    product.style.transform = 'translateY(20px)';

                    setTimeout(() => {
                        product.style.opacity = '1';
                        product.style.transform = 'translateY(0)';
                    }, index * 100);

                    visibleCount++;
                } else {
                    // Ẩn sản phẩm
                    product.style.opacity = '0';
                    product.style.transform = 'translateY(-20px)';

                    setTimeout(() => {
                        product.style.display = 'none';
                    }, 300);
                }
            });

            // Hiển thị số lượng sản phẩm tìm thấy
            updateProductCount(visibleCount, filterTag);
        }

        // Function cập nhật số lượng sản phẩm
        function updateProductCount(count, category) {
            const countElement = document.getElementById('product-count');
            if (countElement) {
                const categoryText = category === 'all' ? 'tất cả danh mục' : category;
                countElement.textContent = `Tìm thấy ${count} sản phẩm trong ${categoryText}`;
            }
        }

        // Function cập nhật trạng thái active cho tabs
        function updateActiveTab(clickedTab, isDesktop = true) {
            const tabSelector = isDesktop ? '.tab-button' : '.tab-button-mobile';

            document.querySelectorAll(tabSelector).forEach(btn => {
                btn.classList.remove('active');
                if (isDesktop) {
                    btn.classList.remove('bg-white');
                    btn.classList.add('hover:bg-blue-50');
                } else {
                    btn.classList.remove('bg-blue-50', 'border-b-4', 'border-blue-300');
                    btn.classList.add('bg-white');
                }

                const span = btn.querySelector('span');
                if (span) {
                    span.classList.remove('text-blue-700');
                    span.classList.add('text-gray-700');
                }
            });

            // Set active state cho tab được click
            clickedTab.classList.add('active');
            if (isDesktop) {
                clickedTab.classList.add('bg-white');
                clickedTab.classList.remove('hover:bg-blue-50');
            } else {
                clickedTab.classList.add('bg-blue-50', 'border-b-4', 'border-blue-300');
                clickedTab.classList.remove('bg-white');
            }

            const span = clickedTab.querySelector('span');
            if (span) {
                span.classList.remove('text-gray-700');
                span.classList.add('text-blue-700');
            }
        }

        // Xử lý click tabs trên desktop
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', function() {
                const filterTag = this.dataset.filter;
                if (filterTag) { // Kiểm tra filterTag có tồn tại
                    updateActiveTab(this, true);
                    filterProductsByTag(filterTag);
                }
            });
        });

        // Xử lý click tabs trên mobile
        document.querySelectorAll('.tab-button-mobile').forEach(button => {
            button.addEventListener('click', function() {
                const filterTag = this.dataset.filter;
                if (filterTag) { // Kiểm tra filterTag có tồn tại
                    updateActiveTab(this, false);
                    filterProductsByTag(filterTag);
                }
            });
        });

        // Hiển thị tất cả sản phẩm mặc định khi trang load
        filterProductsByTag('all');
    });
</script>