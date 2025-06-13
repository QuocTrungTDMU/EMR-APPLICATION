{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Liên hệ - Medik')

@section('content')

<section class="relative text-center">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-1" style="opacity: 0.5 !important;"></div>
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed"
        style="background-image: url('http://medik.wpenginepowered.com/wp-content/uploads/2020/02/breadcrumb-bg.jpg');">
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4 py-16 md:py-10">
        <!-- Main Title -->
        <div class="mb-6">
            <h1 class="text-4xl md:text-5xl font-bold text-white">Contact Us</h1>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center justify-center space-x-2 text-white" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="text-white hover:text-blue-300 transition-colors duration-200">
                Home
            </a>
            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="text-gray-300">Contact Us</span>
        </nav>
    </div>
</section>

<!-- Map Section -->
<section class="w-full h-96 md:h-[500px] relative">
    <!-- Google Maps iframe -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.819451319302!2d106.67307807485646!3d10.738938789407609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e53285f9353%3A0xbafac680a346c0ef!2zMTA1IFRy4bqnbiBUaOG7iyBOxqFpLCBQaMaw4budbmcgNCwgUXXhuq1uIDgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e1!3m2!1svi!2s!4v1749025955525!5m2!1svi!2s"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="w-full h-full">
    </iframe>

    <!-- Map overlay controls -->
    <div class="absolute top-4 right-4 bg-white rounded-lg shadow-lg p-2">
        <button class="text-gray-600 hover:text-gray-800 p-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </div>
</section>

<!-- Main Contact Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Contact Information</h2>

                <!-- Contact Cards -->
                <div class="space-y-6">
                    <!-- Address -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Address</h3>
                            <p class="text-gray-600">123 Medical Center Drive<br>Health City, HC 12345<br>United States</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Phone</h3>
                            <p class="text-gray-600">+1 (555) 123-4567<br>+1 (555) 987-6543</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Email</h3>
                            <p class="text-gray-600">info@medik.com<br>support@medik.com</p>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="flex items-start space-x-4">
                        <div class="bg-orange-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Business Hours</h3>
                            <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="bg-blue-800 text-white p-3 rounded-full hover:bg-blue-900 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="bg-pink-600 text-white p-3 rounded-full hover:bg-pink-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ✅ CONTACT FORM với Safe Variable Access -->
            <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-12">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Send Us a Message</h2>

                    {{-- ✅ SAFE USER STATUS INDICATOR --}}
                    @auth
                    @php
                    $hasNksData = isset($userData) && !empty($userData);
                    @endphp
                    <div class="flex items-center {{ $hasNksData ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }} px-4 py-2 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            @if($hasNksData)
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            @else
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            @endif
                        </svg>
                        @if($hasNksData)
                        🔐 NKS User: {{ Auth::user()->name ?? 'User' }}
                        @else
                        👤 Local User: {{ Auth::user()->name ?? 'User' }}
                        @endif
                    </div>
                    @else
                    <div class="flex items-center bg-gray-100 text-gray-800 px-4 py-2 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        👤 Guest User
                    </div>
                    @endauth
                </div>

                {{-- ✅ INFO MESSAGE cho Authenticated Users --}}
                @auth
                <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    Thông tin của bạn đã được điền sẵn. Chỉ cần nhập tin nhắn và gửi!
                </div>
                @endauth

                {{-- ✅ SUCCESS & ERROR MESSAGES --}}
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6" id="contactForm">
                    @csrf

                    <!-- ✅ NAME & EMAIL với Safe Variable Access -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name *
                                @auth
                                <span class="text-green-600 text-xs">(Auto-filled)</span>
                                @endauth
                            </label>
                            <input type="text" id="name" name="name"
                                @auth readonly @else required @endauth
                                value="{{ $userData['name'] ?? old('name') ?? '' }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 
                                @auth bg-gray-50 cursor-not-allowed @endauth
                                @error('name') border-red-500 ring-2 ring-red-200 @enderror"
                                placeholder="John Doe">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address *
                                @auth
                                <span class="text-green-600 text-xs">(Auto-filled)</span>
                                @endauth
                            </label>
                            <input type="email" id="email" name="email"
                                @auth readonly @else required @endauth
                                value="{{ $userData['email'] ?? old('email') ?? '' }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 
                                @auth bg-gray-50 cursor-not-allowed @endauth
                                @error('email') border-red-500 ring-2 ring-red-200 @enderror"
                                placeholder="john@example.com">
                            @error('email')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <!-- ✅ PHONE & SUBJECT -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number
                                @auth
                                @if(isset($userData['phone']) && !empty($userData['phone']))
                                <span class="text-green-600 text-xs">(Auto-filled)</span>
                                @endif
                                @endauth
                            </label>
                            <input type="tel" id="phone" name="phone"
                                value="{{ $userData['phone'] ?? old('phone') ?? '' }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('phone') border-red-500 ring-2 ring-red-200 @enderror"
                                placeholder="+1 (555) 123-4567">
                            @error('phone')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('subject') border-red-500 ring-2 ring-red-200 @enderror">
                                <option value="">Select a subject</option>
                                <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                                <option value="appointment" {{ old('subject') == 'appointment' ? 'selected' : '' }}>Appointment Request</option>
                                <option value="medical" {{ old('subject') == 'medical' ? 'selected' : '' }}>Medical Question</option>
                                <option value="billing" {{ old('subject') == 'billing' ? 'selected' : '' }}>Billing Support</option>
                                <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('subject')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <!-- ✅ MESSAGE FIELD -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message *
                            <span class="text-blue-600 text-xs">(Focus here!)</span>
                        </label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none @error('message') border-red-500 ring-2 ring-red-200 @enderror"
                            placeholder="Please describe how we can help you...">{{ old('message') ?? '' }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- ✅ SUBMIT BUTTON -->
                    <div>
                        <button type="submit" id="submitBtn"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-4 px-8 rounded-lg hover:from-blue-700 hover:to-blue-800 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                            <span class="flex items-center justify-center" id="buttonContent">
                                <svg id="submitIcon" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                <span id="submitText">
                                    @auth
                                    Send Message as {{ Auth::user()->name ?? 'User' }}
                                    @else
                                    Send Message
                                    @endauth
                                </span>
                            </span>
                        </button>
                    </div>

                    {{-- ✅ LOGIN SUGGESTION cho Guest Users --}}
                    @guest
                    <div class="text-center pt-4">
                        <p class="text-gray-600 text-sm">
                            Have an account?
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                Login here
                            </a>
                            to auto-fill your information next time!
                        </p>
                    </div>
                    @endguest
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ✅ SUCCESS MODAL - Safe Implementation -->
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Gửi thành công!</h3>
                        <p class="text-green-100 text-sm">Tin nhắn đã được gửi</p>
                    </div>
                </div>
                <button onclick="closeSuccessModal()" class="text-white hover:text-gray-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h4 class="text-lg font-semibold text-gray-800 mb-2">Cảm ơn bạn đã liên hệ!</h4>
                <p class="text-gray-600 mb-6" id="modalMessage">
                    Tin nhắn của bạn đã được gửi thành công. Chúng tôi sẽ phản hồi trong thời gian sớm nhất có thể.
                </p>

                <!-- Progress Bar -->
                <div class="mb-6">
                    <div class="flex justify-between text-sm text-gray-500 mb-2">
                        <span>Đang xử lý...</span>
                        <span id="timeRemaining">5s</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div id="progressBar" class="bg-green-500 h-2 rounded-full transition-all duration-1000" style="width: 100%"></div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-4">
                    <button onclick="closeSuccessModal()"
                        class="flex-1 bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                        Đóng
                    </button>
                    <button onclick="sendAnotherMessage()"
                        class="flex-1 bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Gửi tin nhắn khác
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- ✅ SAFE JAVASCRIPT Implementation --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitIcon = document.getElementById('submitIcon');
        const inputs = form.querySelectorAll('input, select, textarea');
        const isAuthenticated = {
            {
                auth() - > check() ? 'true' : 'false'
            }
        };

        // ✅ CHECK FOR SUCCESS SESSION và SHOW MODAL
        @if(session('success'))
        setTimeout(() => {
            showSuccessModal(`{{ session('success') }}`);
        }, 500);
        @endif

        // ✅ AUTO-FOCUS MESSAGE FIELD for authenticated users
        if (isAuthenticated) {
            const messageField = document.getElementById('message');
            if (messageField) {
                messageField.focus();
                messageField.classList.add('ring-2', 'ring-blue-300');
                setTimeout(() => {
                    messageField.classList.remove('ring-2', 'ring-blue-300');
                }, 2000);
            }
        }

        // ✅ FORM SUBMISSION HANDLING
        if (form) {
            form.addEventListener('submit', function(e) {
                if (submitBtn) {
                    submitBtn.disabled = true;

                    if (submitText) {
                        const userName = isAuthenticated ? '{{ Auth::user()->name ?? "" }}' : '';
                        submitText.textContent = isAuthenticated ? `Sending as ${userName}...` : 'Sending...';
                    }

                    if (submitIcon) {
                        submitIcon.innerHTML = `
                        <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    `;
                    }
                }
            });
        }
    });

    // ✅ SUCCESS MODAL FUNCTIONS
    function showSuccessModal(message) {
        const modal = document.getElementById('successModal');
        const modalContent = document.getElementById('modalContent');
        const modalMessage = document.getElementById('modalMessage');

        if (modal && modalContent) {
            if (message && modalMessage) {
                modalMessage.textContent = message;
            }

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');

            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 50);

            startCountdown();
        }
    }

    function closeSuccessModal() {
        const modal = document.getElementById('successModal');
        const modalContent = document.getElementById('modalContent');

        if (modal && modalContent) {
            modalContent.classList.add('scale-95', 'opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');

                // Reset form if needed
                const form = document.getElementById('contactForm');
                const messageField = document.getElementById('message');
                const subjectField = document.getElementById('subject');

                if (messageField) messageField.value = '';
                if (subjectField) subjectField.value = '';
            }, 300);
        }
    }

    function sendAnotherMessage() {
        closeSuccessModal();
        setTimeout(() => {
            const messageField = document.getElementById('message');
            if (messageField) {
                messageField.focus();
                messageField.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }, 400);
    }

    function startCountdown() {
        let timeLeft = 5;
        const timeElement = document.getElementById('timeRemaining');
        const progressBar = document.getElementById('progressBar');

        const interval = setInterval(() => {
            timeLeft--;
            if (timeElement) timeElement.textContent = `${timeLeft}s`;
            if (progressBar) progressBar.style.width = `${(timeLeft / 5) * 100}%`;

            if (timeLeft <= 0) {
                clearInterval(interval);
                closeSuccessModal();
            }
        }, 1000);

        window.countdownInterval = interval;
    }

    // ✅ SAFE EVENT LISTENERS
    document.addEventListener('click', function(e) {
        const modal = document.getElementById('successModal');
        if (modal && e.target === modal) {
            closeSuccessModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('successModal');
            if (modal && !modal.classList.contains('hidden')) {
                closeSuccessModal();
            }
        }
    });
</script>
@endpush

{{-- ✅ SAFE STYLES --}}
@push('styles')
<style>
    /* ✅ SAFE CSS Implementation */
    .focused label {
        color: #3b82f6;
        transform: translateY(-2px);
        transition: all 0.2s ease;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .animate-spin {
        animation: spin 1s linear infinite;
    }

    input,
    select,
    textarea {
        transition: all 0.2s ease;
    }

    input:focus,
    select:focus,
    textarea:focus {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    }

    button:hover {
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }

    #successModal {
        backdrop-filter: blur(4px);
    }

    #modalContent {
        will-change: transform, opacity;
    }

    #progressBar {
        transition: width 1s linear;
    }

    @media (max-width: 640px) {
        #modalContent {
            margin: 1rem;
            max-width: calc(100vw - 2rem);
        }
    }
</style>
@endpush