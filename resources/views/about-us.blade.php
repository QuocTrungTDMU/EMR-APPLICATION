@extends('layouts.app')

@section('title', 'Về chúng tôi - Medik')

@section('content')

<!-- Hero Section -->
<section class="relative text-center">
    <div class="absolute inset-0 bg-black bg-opacity-50 z-1" style="opacity: 0.5;"></div>
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed"
        style="background-image: url('http://medik.wpenginepowered.com/wp-content/uploads/2020/02/breadcrumb-bg.jpg');">
    </div>

    <div class="relative z-10 container mx-auto px-4 py-16 md:py-10">
        <div class="mb-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white">About Us</h1>
        </div>

        <nav class="flex items-center justify-center space-x-2 text-white" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                Home
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-300">About Us</span>
        </nav>
    </div>
</section>

<!-- ✅ THE BEST INFRASTRUCTURE SECTION -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Image -->
            <div class="order-2 lg:order-1" data-aos="fade-right">
                <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/07/about.jpg"
                    alt="The Best Infrastructure"
                    class="w-full h-auto rounded-lg shadow-lg">
            </div>

            <!-- Content -->
            <div class="order-1 lg:order-2" data-aos="fade-left">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-6">
                    The Best Infrastructure
                </h2>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        Unpacked reserved sir offering bed judgment may and quitting speaking. Is do be improved raptures offering required in replying raillery. Stairs ladies friend by in mutual an no. Mr hence chief he cause. Whole no doors on hoped. Mile tell if help they ye full name.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comm consequat.
                    </p>
                </div>
                <div class="mt-8">
                    <a href="/contact"
                        class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                        View Help
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ✅ HOW TO BUY ONLY THE BEST SECTION -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                How to Buy Only the Best
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Pellentesque posuere orci lobortis scelerisque blandit. Donec id tellus lacinia an, tincidunt risus ac
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">Buy The Best For Your Kids</a>
                </h4>
                <p class="text-gray-600 leading-relaxed">
                    Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-gift text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">Do Not Buy Too Many Things</a>
                </h4>
                <p class="text-gray-600 leading-relaxed">
                    Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-ticket-alt text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">Let Kids Understand</a>
                </h4>
                <p class="text-gray-600 leading-relaxed">
                    Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" data-aos="fade-up" data-aos-delay="400">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fab fa-pagelines text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">Let Them Appreciate</a>
                </h4>
                <p class="text-gray-600 leading-relaxed">
                    Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" data-aos="fade-up" data-aos-delay="500">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-globe text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">Do Not Deprive The Essentials</a>
                </h4>
                <p class="text-gray-600 leading-relaxed">
                    Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300" data-aos="fade-up" data-aos-delay="600">
                <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-cog text-white text-2xl"></i>
                </div>
                <h4 class="text-xl font-bold text-gray-800 mb-4">
                    <a href="#" class="hover:text-blue-600 transition-colors">Be Sensitive To Their Needs</a>
                </h4>
                <p class="text-gray-600 leading-relaxed">
                    Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ✅ MONTHLY SEMINARS SECTION -->
<section class="py-16 bg-gray-800 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-center">
            <!-- Content -->
            <div class="lg:col-span-3" data-aos="fade-right">
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                    <span class="text-cyan-400">Join us :</span> Monthly Seminars on Bringing up Kids
                </h2>
                <p class="text-gray-300 text-lg leading-relaxed">
                    Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.
                </p>
            </div>

            <!-- CTA Button -->
            <div class="lg:col-span-1 text-center lg:text-right" data-aos="fade-left">
                <a href="/contact"
                    class="inline-flex items-center bg-white text-gray-800 font-semibold px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors duration-200 shadow-md hover:shadow-lg">
                    View Help Videos
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ✅ FAQ & VIDEO SECTION -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- ✅ INTERACTIVE FAQ SECTION -->
            <div data-aos="fade-right">
                <h3 class="text-2xl font-bold text-gray-800 mb-8">Frequently Asked Questions</h3>

                <div class="space-y-4" id="faqAccordion">
                    <!-- FAQ Item 1 -->
                    <div class="border border-gray-200 rounded-lg">
                        <button class="w-full px-6 py-4 text-left bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-between"
                            onclick="toggleFAQ('faq1')">
                            <span>Should I allow the child total freedom?</span>
                            <svg id="faq1-icon" class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="faq1" class="px-6 py-4 bg-blue-50" style="display: block;">
                            <p class="text-gray-700">
                                Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales Includes Business as well as Professionals bibendum sodales, augue velit cursus
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="border border-gray-200 rounded-lg">
                        <button class="w-full px-6 py-4 text-left bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-between"
                            onclick="toggleFAQ('faq2')">
                            <span>Is Force Feeding good at times?</span>
                            <svg id="faq2-icon" class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="faq2" class="px-6 py-4 bg-blue-50" style="display: none;">
                            <p class="text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="border border-gray-200 rounded-lg">
                        <button class="w-full px-6 py-4 text-left bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-between"
                            onclick="toggleFAQ('faq3')">
                            <span>Should I meet a psychologist for errant behaviour?</span>
                            <svg id="faq3-icon" class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="faq3" class="px-6 py-4 bg-blue-50" style="display: block;">
                            <p class="text-gray-700">
                                Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales Includes Business as well as Professionals bibendum sodales, augue velit cursus
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="border border-gray-200 rounded-lg">
                        <button class="w-full px-6 py-4 text-left bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-between"
                            onclick="toggleFAQ('faq4')">
                            <span>Pacifier is really needed for a child?</span>
                            <svg id="faq4-icon" class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="faq4" class="px-6 py-4 bg-blue-50" style="display: none;">
                            <p class="text-gray-700">
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ✅ VIDEO SECTION với MODAL -->
            <div data-aos="fade-left">
                <h3 class="text-2xl font-bold text-gray-800 mb-8">We are Responsible Shoppers</h3>

                <div class="relative cursor-pointer group" onclick="openVideoModal()">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/07/video.jpg"
                        alt="Video Thumbnail"
                        class="w-full h-auto rounded-lg shadow-lg transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">

                    <!-- ✅ ENHANCED PLAY BUTTON -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="relative">
                            <!-- Pulse animation background -->
                            <div class="absolute inset-0 w-20 h-20 bg-red-600 rounded-full animate-ping opacity-20"></div>

                            <!-- Main play button -->
                            <div class="relative w-20 h-20 bg-red-600 hover:bg-red-700 rounded-full flex items-center justify-center shadow-xl transform group-hover:scale-110 transition-all duration-300">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- ✅ VIDEO DURATION BADGE -->
                    <div class="absolute bottom-4 right-4 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-sm font-medium">
                        2:45
                    </div>

                    <!-- ✅ HOVER OVERLAY với info -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-end">
                        <div class="p-4 text-white">
                            <h4 class="font-semibold mb-1">Responsible Shopping Guide</h4>
                            <p class="text-sm text-gray-200">Learn how to make informed purchasing decisions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ✅ TEAM CONSULTATION SECTION -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Meet Our Free Consultation
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Pellentesque posuere orci lobortis scelerisque blandit. Donec id tellus lacinia an, tincidunt risus ac
            </p>
        </div>

        <!-- Team Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="relative overflow-hidden">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/07/team1.jpg"
                        alt="Helen Reyes"
                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">

                    <!-- Social Links Overlay -->
                    <div class="absolute inset-0 bg-blue-600 bg-opacity-90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 text-center">
                    <h4 class="text-xl font-bold text-blue-600 mb-2">Helen Reyes</h4>
                    <p class="text-gray-500">CHILD PSYCHOLOGIST</p>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="relative overflow-hidden">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/07/team2.jpg"
                        alt="Julius Goodman"
                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">

                    <div class="absolute inset-0 bg-blue-600 bg-opacity-90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 text-center">
                    <h4 class="text-xl font-bold text-blue-600 mb-2">Julius Goodman</h4>
                    <p class="text-gray-500">BEHAVIOURAL PSYCHOLOGIST</p>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="relative overflow-hidden">
                    <img src="https://medik.wpenginepowered.com/wp-content/uploads/2019/07/team3.jpg"
                        alt="Oliver Wheeler"
                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">

                    <div class="absolute inset-0 bg-blue-600 bg-opacity-90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-blue-600 hover:bg-blue-50 transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-6 text-center">
                    <h4 class="text-xl font-bold text-blue-600 mb-2">Oliver Wheeler</h4>
                    <p class="text-gray-500">PEDIATRICIAN</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ✅ VIDEO MODAL POPUP -->
<div id="videoModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center hidden backdrop-blur-sm">
    <!-- Loading Spinner -->
    <div id="videoLoading" class="absolute inset-0 flex items-center justify-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-white"></div>
    </div>

    <!-- Modal Content -->
    <div class="relative w-full max-w-5xl mx-4 transform transition-all duration-300">
        <!-- ✅ MODAL HEADER -->
        <div class="flex items-center justify-between mb-4">
            <div class="text-white">
                <h3 id="videoTitle" class="text-xl font-semibold">Responsible Shopping Guide</h3>
                <p id="videoDescription" class="text-gray-300 text-sm">Learn effective shopping strategies</p>
            </div>

            <!-- ✅ CLOSE BUTTON -->
            <button onclick="closeVideoModal()"
                class="text-white hover:text-gray-300 transition-colors duration-200 p-2 hover:bg-white hover:bg-opacity-10 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- ✅ VIDEO CONTAINER -->
        <div class="relative bg-black rounded-lg overflow-hidden shadow-2xl">
            <div class="aspect-video">
                <!-- YouTube/Vimeo iframe -->
                <iframe id="videoFrame"
                    class="w-full h-full"
                    src=""
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    onload="hideLoading()">
                </iframe>
            </div>
        </div>

        <!-- ✅ VIDEO CONTROLS -->
        <div class="mt-4 flex items-center justify-between text-white text-sm">
            <div class="flex items-center space-x-4">
                <button class="flex items-center space-x-2 hover:text-gray-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6m8-3a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-6l-4 4v-4H9a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h10z" />
                    </svg>
                    <span>Share</span>
                </button>
            </div>

            <div class="text-gray-400">
                Press ESC to close
            </div>
        </div>
    </div>
</div>

@endsection

{{-- ✅ EXTERNAL LIBRARIES --}}
@push('styles')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    /* ✅ CUSTOM ANIMATIONS */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(20px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ✅ BACKDROP BLUR support */
    .backdrop-blur-sm {
        backdrop-filter: blur(4px);
    }

    /* ✅ PULSE ANIMATION */
    @keyframes ping {

        75%,
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    .animate-ping {
        animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    /* ✅ ASPECT RATIO cho video */
    .aspect-video {
        aspect-ratio: 16 / 9;
    }

    /* ✅ FAQ Animation */
    .faq-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .faq-content.open {
        max-height: 200px;
    }

    /* ✅ Team hover effects */
    .team-social {
        transform: translateY(20px);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .group:hover .team-social {
        transform: translateY(0);
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // ✅ Initialize AOS
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // ✅ FAQ ACCORDION FUNCTIONALITY
    function toggleFAQ(faqId) {
        const content = document.getElementById(faqId);
        const icon = document.getElementById(faqId + '-icon');

        if (content.style.display === 'none') {
            // Close all other FAQs
            const allFAQs = document.querySelectorAll('#faqAccordion [id^="faq"]');
            allFAQs.forEach(faq => {
                if (faq.id !== faqId && faq.id.includes('-')) return;
                if (faq.id !== faqId) {
                    faq.style.display = 'none';
                    const faqIcon = document.getElementById(faq.id + '-icon');
                    if (faqIcon) faqIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Open selected FAQ
            content.style.display = 'block';
            icon.style.transform = 'rotate(180deg)';
        } else {
            // Close selected FAQ
            content.style.display = 'none';
            icon.style.transform = 'rotate(0deg)';
        }
    }

    // ✅ VIDEO MODAL FUNCTIONS
    function openVideoModal() {
        const modal = document.getElementById('videoModal');
        const iframe = document.getElementById('videoFrame');
        const loading = document.getElementById('videoLoading');

        // Show loading
        loading.classList.remove('hidden');

        // Set video source
        const youtubeUrl = 'https://www.youtube.com/embed/VsJKTBaIjr8?autoplay=1&rel=0&modestbranding=1';
        iframe.src = youtubeUrl;

        // Show modal
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');

        // Entrance animation
        setTimeout(() => {
            modal.classList.add('animate-fadeIn');
        }, 10);
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const iframe = document.getElementById('videoFrame');
        const loading = document.getElementById('videoLoading');

        // Stop video
        iframe.src = '';

        // Hide modal
        modal.classList.add('hidden');
        modal.classList.remove('animate-fadeIn');
        document.body.classList.remove('overflow-hidden');
        loading.classList.add('hidden');
    }

    function hideLoading() {
        const loading = document.getElementById('videoLoading');
        loading.classList.add('hidden');
    }

    // ✅ EVENT LISTENERS
    document.getElementById('videoModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeVideoModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeVideoModal();
        }
    });

    // ✅ SMOOTH SCROLLING for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endpush