<!-- Topbar -->
<div class="w-full bg-blue-600 text-white text-sm py-2">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Desktop Topbar -->
        <div class="hidden md:flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22 16.92V19a2 2 0 0 1-2.18 2A19.72 19.72 0 0 1 3 5.18 2 2 0 0 1 5 3h2.09a2 2 0 0 1 2 1.72 13 13 0 0 0 .57 2.57 2 2 0 0 1-.45 2.11l-.27.27a16 16 0 0 0 6.29 6.29l.27-.27a2 2 0 0 1 2.11-.45 13 13 0 0 0 2.57.57A2 2 0 0 1 21 16.92z" />
                    </svg>
                    <span>(00) 000 111 222</span>
                </span>
                <span class="text-blue-300">|</span>
                <span class="flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect width="20" height="14" x="2" y="5" rx="2" />
                        <polyline points="2,5 12,13 22,5" />
                    </svg>
                    <span>info@somedomain.com</span>
                </span>
            </div>

            <!-- ✅ User info với session check -->
            <div class="flex items-center space-x-3">
                @if(session('is_authenticated') === true && session('user_name'))
                <span class="flex items-center space-x-2 text-blue-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                    </svg>
                    <span>Welcome, {{ session('user_name') }}</span>
                </span>
                <span class="text-blue-300">|</span>
                @endif

                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.27 4.27 0 0 0 1.88-2.37 8.52 8.52 0 0 1-2.7 1.03 4.24 4.24 0 0 0-7.23 3.87A12.07 12.07 0 0 1 3.11 4.6a4.24 4.24 0 0 0 1.31 5.66c-.7-.02-1.36-.21-1.94-.53v.05a4.25 4.25 0 0 0 3.4 4.16c-.33.09-.68.13-1.04.13-.25 0-.5-.02-.74-.07a4.25 4.25 0 0 0 3.97 2.95A8.5 8.5 0 0 1 2 19.54a12.06 12.06 0 0 0 6.54 1.92c7.85 0 12.14-6.5 12.14-12.14 0-.19 0-.38-.01-.57A8.7 8.7 0 0 0 24 4.59a8.54 8.54 0 0 1-2.54.7z" />
                    </svg>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 5 3.66 9.13 8.44 9.88v-6.99H7.9v-2.89h2.54V9.41c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.45h-1.26c-1.24 0-1.62.77-1.62 1.56v1.87h2.77l-.44 2.89h-2.33v6.99C18.34 21.13 22 17 22 12" />
                    </svg>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M21.35 11.1h-9.18v2.78h5.25c-.22 1.17-1.37 3.43-5.25 3.43-3.16 0-5.74-2.61-5.74-5.82s2.58-5.82 5.74-5.82c1.8 0 3 .73 3.69 1.35l2.52-2.45C17.01 3.56 14.97 2.5 12.17 2.5 6.9 2.5 2.5 6.7 2.5 12s4.4 9.5 9.67 9.5c5.57 0 9.22-3.91 9.22-9.43 0-.63-.07-1.12-.16-1.57z" />
                    </svg>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3.2" />
                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5z" />
                        <circle cx="17.5" cy="6.5" r="1.13" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Mobile Topbar -->
        <div class="md:hidden flex flex-col items-center space-y-2">
            @if(session('is_authenticated') === true && session('user_name'))
            <div class="flex items-center space-x-2 text-blue-200 text-xs">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                </svg>
                <span>Hi, {{ session('user_name') }}</span>
            </div>
            @endif

            <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M22 16.92V19a2 2 0 0 1-2.18 2A19.72 19.72 0 0 1 3 5.18 2 2 0 0 1 5 3h2.09a2 2 0 0 1 2 1.72 13 13 0 0 0 .57 2.57 2 2 0 0 1-.45 2.11l-.27.27a16 16 0 0 0 6.29 6.29l.27-.27a2 2 0 0 1 2.11-.45 13 13 0 0 0 2.57.57A2 2 0 0 1 21 16.92z" />
                </svg>
                <span>(00) 000 111 222</span>
            </div>
            <div class="flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect width="20" height="14" x="2" y="5" rx="2" />
                    <polyline points="2,5 12,13 22,5" />
                </svg>
                <span>info@somedomain.com</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.27 4.27 0 0 0 1.88-2.37 8.52 8.52 0 0 1-2.7 1.03 4.24 4.24 0 0 0-7.23 3.87A12.07 12.07 0 0 1 3.11 4.6a4.24 4.24 0 0 0 1.31 5.66c-.7-.02-1.36-.21-1.94-.53v.05a4.25 4.25 0 0 0 3.4 4.16c-.33.09-.68.13-1.04.13-.25 0-.5-.02-.74-.07a4.25 4.25 0 0 0 3.97 2.95A8.5 8.5 0 0 1 2 19.54a12.06 12.06 0 0 0 6.54 1.92c7.85 0 12.14-6.5 12.14-12.14 0-.19 0-.38-.01-.57A8.7 8.7 0 0 0 24 4.59a8.54 8.54 0 0 1-2.54.7z" />
                    </svg>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 5 3.66 9.13 8.44 9.88v-6.99H7.9v-2.89h2.54V9.41c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.45h-1.26c-1.24 0-1.62.77-1.62 1.56v1.87h2.77l-.44 2.89h-2.33v6.99C18.34 21.13 22 17 22 12" />
                    </svg>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M21.35 11.1h-9.18v2.78h5.25c-.22 1.17-1.37 3.43-5.25 3.43-3.16 0-5.74-2.61-5.74-5.82s2.58-5.82 5.74-5.82c1.8 0 3 .73 3.69 1.35l2.52-2.45C17.01 3.56 14.97 2.5 12.17 2.5 6.9 2.5 2.5 6.7 2.5 12s4.4 9.5 9.67 9.5c5.57 0 9.22-3.91 9.22-9.43 0-.63-.07-1.12-.16-1.57z" />
                    </svg>
                </a>
                <a href="#" class="hover:text-blue-200 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3.2" />
                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5z" />
                        <circle cx="17.5" cy="6.5" r="1.13" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="sticky top-0 z-40 bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 py-3">
        <!-- Desktop Header -->
        <div class="hidden lg:flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="https://medik.wpenginepowered.com/wp-content/themes/medik/images/logo.png"
                        alt="Medik Logo"
                        class="h-10 w-auto hover:scale-105 transition-transform duration-200">
                </a>
            </div>

            <!-- Desktop Menu -->
            <nav class="flex-1 flex justify-center">
                <ul class="flex items-center space-x-10 text-base font-medium">
                    <li class="relative group">
                        <button class="flex items-center space-x-1 text-blue-600 hover:text-blue-700 transition-colors py-2">
                            <span>Home</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute left-1/2 transform -translate-x-1/2 top-full mt-1 w-64 bg-white rounded-lg shadow-lg border border-gray-100 py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Covid-19 Supplies Demo</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Pressure Monitor Demo</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Thermometer Demo</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Hand Sanitizer</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Medik Shop</a>
                        </div>
                    </li>
                    <li><a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition-colors py-2">About</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="text-gray-700 hover:text-blue-600 transition-colors py-2">Blog</a></li>
                    <li class="relative group">
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors py-2 ">Page+</a>
                        <ul class="absolute hidden group-hover:block bg-white shadow-lg mt-2 space-y-2 py-2 w-64 ">
                            <li>
                             <a href="/dashboard" class="text-gray-700 hover:text-blue-600 block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 transition-colors">Dashboard</a>
                            </li>
                            <li><a href="{{ route('availability.checker') }}" class="text-gray-700 hover:text-blue-600 block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 transition-colors">Availability Checker</a></li>
                            <li><a href="{{ route('telemedicine') }}" class="text-gray-700 hover:text-blue-600 block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 transition-colors">Online Consultation & Telemedicine</a></li>
                            <li><a href="{{ route('faq') }}" class="text-gray-700 hover:text-blue-600 block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 transition-colors">FAQ</a></li>
                            <li><a href="{{ route('testimonials') }}" class="text-gray-700 hover:text-blue-600 block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 transition-colors">Testimonials</a></li>
                            <li><a href="{{ route('patient-account') }}" class="text-gray-700 hover:text-blue-600 block px-4 py-2 hover:bg-blue-50 hover:text-blue-600 transition-colors">Patient Account</a></li>
                        </ul>
                    </li>
                    <!-- Shop with submenu -->
                    <li class="relative group">
                        <button class="flex items-center space-x-1 text-blue-600 hover:text-blue-700 transition-colors py-2">
                            <span>Shop</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute left-1/2 transform -translate-x-1/2 top-full mt-1 w-64 bg-white rounded-lg shadow-lg border border-gray-100 py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Cart</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">Checkout</a>
                            <a href="#" class="block px-4 py-2 text-blue-600 font-semibold hover:bg-blue-50 transition-colors">Wishlist</a>
                        </div>
                    </li>
                    <li class="relative group">
                        <a href="{{ route('contact') ?? '#' }}" class="flex items-center space-x-1 text-blue-600 hover:text-blue-700 transition-colors py-2">
                            <span>Contact Us</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Desktop Icons -->
            <div class="flex items-center space-x-4">
                <!-- ✅ GIỮ LẠI Notification Component - Chỉ khi authenticated -->
                @if(session('is_authenticated') === true)
                @include('components.notifications.dropdown')
                @else
                <!-- Debug: Hiển thị khi chưa login -->
                <div style="color: red; font-size: 12px;">Not logged in</div>
                @endauth
                <!-- Biểu tượng Tài khoản với Dropdown -->
                <div class="group relative">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors flex items-center" title="Account">
                        @php
                            if (!isset($user) || !$user) {
                                $user = auth()->user();
                            }
                            $avatar = null;
                            if (isset($user) && !empty($user->avatar)) {
                                $avatar = $user->avatar;
                            } elseif (isset($user) && !empty($user->avatar_url)) {
                                $avatar = $user->avatar_url;
                            }
                        @endphp
                        @if($avatar)
                            <img src="{{ $avatar }}" alt="Avatar" class="header-avatar w-8 h-8 rounded-full border-2 border-blue-200 object-cover shadow-sm">
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                            </svg>
                        @endif
                    </a>
                    <!-- Menu Dropdown -->
                    <div class="absolute right-0 top-full mt-2 w-64 bg-white rounded-xl shadow-xl border border-gray-200 py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-out">
                        @if(session('is_authenticated') === true && session('user_name'))
                        <!-- User Info -->
                        <div class="px-4 py-2 border-b border-gray-100">
                            <div class="text-sm font-medium text-gray-500">Đăng nhập với tên</div>
                            <div class="font-semibold text-gray-900 truncate header-username">
                                @if( isset($user->first_name)|| isset($user->last_name))
                                    {{ ($user->first_name ?? '') . ' ' . ($user->last_name ?? '') }}
                                @else
                                    {{ $user->name ?? '' }}
                                @endif
                            </div>
                        </div>

                        <!-- Menu Items -->
                        <div class="px-4 py-2">
                            <a href="{{ route('profile.update') }}" class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Tài khoản của tôi</span>
                            </a>

                            <a href="{{ route('homepage') ?? '/' }}" class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </div>

                        <!-- ✅ FIXED Logout Button -->
                        <div class="px-4 py-2 border-t border-gray-100">
                            <form method="POST" action="{{ route('logout') }}" id="logoutFormDesktop">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors"
                                    onclick="try { localStorage.clear(); sessionStorage.clear(); } catch(e) {} return true;">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Đăng xuất</span>
                                </button>
                            </form>
                        </div>
                        @else
                        <!-- Guest User -->
                        <div class="px-4 py-2">
                            <a href="{{ route('login') }}" class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span>Đăng nhập</span>
                            </a>
                            <a href="{{ route('register') ?? '#' }}" class="flex items-center gap-2 px-3 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                                <span>Đăng ký</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Biểu tượng Giỏ hàng -->
                <a href="#" class="relative text-gray-600 hover:text-blue-600 transition-colors" title="Cart">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1" />
                        <circle cx="20" cy="21" r="1" />
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                    </svg>
                    <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-medium">1</span>
                </a>

                <!-- Nút Chuyển đổi Chế độ Sáng/Tối -->
                <button id="theme-toggle" class="relative text-gray-600 hover:text-blue-600 transition-colors" title="Chuyển chế độ Sáng/Tối">
                    <svg id="theme-toggle-dark-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg id="theme-toggle-light-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>
            </div>

            <script>
                // Lấy nút chuyển đổi và các biểu tượng
                const themeToggleBtn = document.getElementById('theme-toggle');
                const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                // Kiểm tra chế độ đã lưu trong localStorage
                if (localStorage.getItem('theme') === 'dark' || 
                    (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                    themeToggleLightIcon.classList.remove('hidden');
                } else {
                    document.documentElement.classList.remove('dark');
                    themeToggleDarkIcon.classList.remove('hidden');
                }

                // Chuyển đổi chế độ khi nhấn nút
                themeToggleBtn.addEventListener('click', () => {
                    document.documentElement.classList.toggle('dark');
                    if (document.documentElement.classList.contains('dark')) {
                        localStorage.setItem('theme', 'dark');
                        themeToggleLightIcon.classList.remove('hidden');
                        themeToggleDarkIcon.classList.add('hidden');
                    } else {
                        localStorage.setItem('theme', 'light');
                        themeToggleDarkIcon.classList.remove('hidden');
                        themeToggleLightIcon.classList.add('hidden');
                    }
                });
            </script>
        </div>

        <!-- Mobile Header -->
        <div class="lg:hidden">
            <!-- Tablet Layout -->
            <div class="hidden sm:flex md:flex items-center justify-between w-full p-4">
                <div class="flex items-center space-x-3">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <img src="https://medik.wpenginepowered.com/wp-content/themes/medik/images/logo.png"
                            alt="Medik Logo"
                            class="h-10 w-auto hover:scale-105 transition-transform duration-200">
                    </a>
                </div>

                <div class="flex-1 flex justify-center">
                    <button id="mobile-menu-btn" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span class="text-sm font-medium">Menu</span>
                    </button>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- ✅ GIỮ LẠI Notification cho mobile -->
                    @if(session('is_authenticated') === true)
                    <div class="relative">
                        <button class="text-gray-600 hover:text-blue-600 transition-colors" title="Notifications">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="notification-badge absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-medium hidden">0</span>
                        </button>
                    </div>
                    @endif

                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors" title="Wishlist">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 1.01 4.5 2.09C13.09 4.01 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </a>
                    @auth
                    <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-blue-600 transition-colors" title="Account">
                        @php
                            if (!isset($user) || !$user) {
                                $user = auth()->user();
                            }
                            $avatar = null;
                            if (isset($user) && !empty($user->avatar)) {
                                $avatar = $user->avatar;
                            } elseif (isset($user) && !empty($user->avatar_url)) {
                                $avatar = $user->avatar_url;
                            }
                        @endphp
                        @if($avatar)
                            <img src="{{ $avatar }}" alt="Avatar" class="header-avatar w-8 h-8 rounded-full border-2 border-blue-200 object-cover shadow-sm">
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                            </svg>
                        @endif
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition-colors" title="Login">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                        </svg>
                    </a>
                    @endif

                    <a href="#" class="relative text-gray-600 hover:text-blue-600 transition-colors" title="Cart">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="9" cy="21" r="1" />
                            <circle cx="20" cy="21" r="1" />
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-medium">1</span>
                    </a>
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="sm:hidden flex flex-col items-center space-y-3 p-4">
                <div class="flex items-center space-x-3">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <img src="https://medik.wpenginepowered.com/wp-content/themes/medik/images/logo.png"
                            alt="Medik Logo"
                            class="h-10 w-auto hover:scale-105 transition-transform duration-200">
                    </a>
                </div>

                @if(session('is_authenticated') === true)
                <div class="text-center">
                    <div class="text-sm text-gray-600">Welcome back,</div>
                    <div class="font-semibold text-blue-600">{{ session('user_name') }}</div>
                    @if(session('nks_user_data.role.name'))
                    <div class="text-xs text-gray-500 capitalize">{{ session('nks_user_data.role.name') }}</div>
                    @endif
                </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <button id="mobile-menu-btn-small" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <span class="text-sm font-medium">Menu</span>
                    </button>
                </div>

                <div class="flex items-center justify-center space-x-8 w-full">
                    <!-- ✅ GIỮ LẠI Notification cho mobile small -->
                    @if(session('is_authenticated') === true)
                    <div class="relative">
                        <button class="text-gray-600 hover:text-blue-600 transition-colors" title="Notifications">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="notification-badge absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-medium hidden">0</span>
                        </button>
                    </div>
                    @endif

                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors" title="Wishlist">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 1.01 4.5 2.09C13.09 4.01 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </a>
                    <!-- Account Icon -->
                    @auth
                    <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-blue-600 transition-colors" title="Tài khoản của tôi">
                        @php
                            if (!isset($user) || !$user) {
                                $user = auth()->user();
                            }
                            $avatar = null;
                            if (isset($user) && !empty($user->avatar)) {
                                $avatar = $user->avatar;
                            } elseif (isset($user) && !empty($user->avatar_url)) {
                                $avatar = $user->avatar_url;
                            }
                        @endphp
                        @if($avatar)
                            <img src="{{ $avatar }}" alt="Avatar" class="header-avatar w-8 h-8 rounded-full border-2 border-blue-200 object-cover shadow-sm">
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                            </svg>
                        @endif
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition-colors" title="Đăng nhập">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                        </svg>
                    </a>
                    @endif

                    <a href="#" class="relative text-gray-600 hover:text-blue-600 transition-colors" title="Cart">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="9" cy="21" r="1" />
                            <circle cx="20" cy="21" r="1" />
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-blue-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-medium">1</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

<!-- Mobile Menu Sidebar -->
<div id="mobile-menu" class="fixed top-0 right-0 h-full w-80 bg-white shadow-xl z-50 transform translate-x-full transition-transform duration-300 hidden">
    <div class="flex items-center justify-between p-4 border-b border-gray-200">
        <span class="text-lg font-semibold text-gray-900">Menu</span>
        <button id="mobile-menu-close" class="text-gray-600 hover:text-gray-900">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- ✅ User Info trong Mobile Menu -->
    @if(session('is_authenticated') === true && session('user_name'))
    <div class="p-4 bg-blue-50 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M16 16c0-2.21-3.58-4-8-4s-8 1.79-8 4" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <div class="font-medium text-gray-900 truncate">{{ session('user_name') }}</div>
                <div class="text-sm text-gray-500 truncate">{{ session('user_email') }}</div>
                @if(session('nks_user_data.role.name'))
                <div class="text-xs text-blue-600 font-medium capitalize">{{ session('nks_user_data.role.name') }}</div>
                @endif
            </div>
        </div>
    </div>
    @endif

    <!-- Main Menu -->
    <div id="main-menu" class="overflow-y-auto h-full pb-20">
        @if(session('is_authenticated') === true)
        <div class="border-b border-gray-100">
            <a href="{{ route('profile.edit') ?? '#' }}" class="flex items-center space-x-3 p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span>My Account</span>
            </a>
        </div>

        <div class="border-b border-gray-100">
            <a href="{{ route('homepage') ?? '/' }}" class="flex items-center space-x-3 p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>
        </div>
        @else
        <div class="border-b border-gray-100">
            <a href="{{ route('login') }}" class="flex items-center space-x-3 p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
                <span>Login</span>
            </a>
        </div>

        <div class="border-b border-gray-100">
            <a href="{{ route('register') ?? '#' }}" class="flex items-center space-x-3 p-4 text-gray-700 hover:text-green-600 hover:bg-green-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                <span>Register</span>
            </a>
        </div>
        @endif

        <!-- Menu Items -->
        <div class="border-b border-gray-100">
            <button class="w-full flex items-center justify-between p-4 text-left bg-blue-600 text-white font-medium mobile-menu-item" data-submenu="home">
                <span>Home</span>
                <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <!-- About -->
        <a href="{{ route('about') }}" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">About</a>

        <!-- Blog -->
        <a href="{{ route('blogs.index') }}" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Blog</a>

        <!-- Collection -->
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Page+</a>

        <div class="border-b border-gray-100">
            <button class="w-full flex items-center justify-between p-4 text-left text-gray-700 hover:bg-blue-50 font-medium mobile-menu-item" data-submenu="shop">
                <span>Shop</span>
                <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <a href="{{ route('contact') ?? '#' }}" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Contact Us</a>

        <!-- ✅ FIXED Logout button cho Mobile -->
        @if(session('is_authenticated') === true)
        <div class="border-t-2 border-gray-200 mt-4">
            <form method="POST" action="{{ route('logout') }}" id="logoutFormMobile">
                @csrf
                <button type="submit"
                    class="w-full flex items-center space-x-3 p-4 text-red-600 hover:text-red-700 hover:bg-red-50 transition-colors"
                    onclick="try { localStorage.clear(); sessionStorage.clear(); } catch(e) {} return true;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
        @endif
    </div>

    <!-- Submenus -->
    <div id="submenu-home" class="hidden overflow-y-auto h-full pb-20">
        <button class="w-full flex items-center p-4 text-gray-600 hover:text-blue-600 transition-colors border-b border-gray-200 submenu-back" data-parent="home">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" />
            </svg>
            <span>Home</span>
        </button>
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Covid-19 Supplies Demo</a>
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Pressure Monitor Demo</a>
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Thermometer Demo</a>
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Hand Sanitizer</a>
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Medik Shop</a>
    </div>

    <div id="submenu-shop" class="hidden overflow-y-auto h-full pb-20">
        <button class="w-full flex items-center p-4 text-gray-600 hover:text-blue-600 transition-colors border-b border-gray-200 submenu-back" data-parent="shop">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 19l-7-7 7-7" />
            </svg>
            <span>Shop</span>
        </button>
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Cart</a>
        <a href="#" class="block p-4 text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors border-b border-gray-100">Checkout</a>
        <a href="#" class="block p-4 text-blue-600 font-semibold hover:bg-blue-50 transition-colors border-b border-gray-100">Wishlist</a>
    </div>
</div>

<!-- ✅ FIXED JavaScript với Notification Support -->
<script>
    (function() {
        'use strict';

        // ✅ Error suppression for external scripts ONLY
        window.addEventListener('error', function(e) {
            // Only suppress external app errors, keep notification errors visible for debugging
            if (e.filename && e.filename.includes('app-') &&
                !e.message.includes('notification')) {
                e.preventDefault();
                return false;
            }
        }, true);

        // ✅ SAFE DOM READY
        function domReady(fn) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', fn);
            } else {
                fn();
            }
        }

        domReady(function() {
            console.log('🚀 Header with notifications loaded');

            // ✅ Setup mobile menu safely
            setupMobileMenu();

            // ✅ Setup notification system - chỉ khi authenticated
            @if(session('is_authenticated') === true)
            setupNotificationSystem();
            @else
            console.log('🔕 Notifications disabled - User not authenticated');
            @endif
        });

        // ✅ SAFE MOBILE MENU
        function setupMobileMenu() {
            var elements = {};

            function safeGet(id) {
                try {
                    return document.getElementById(id);
                } catch (e) {
                    return null;
                }
            }

            function safeQueryAll(selector) {
                try {
                    return document.querySelectorAll(selector) || [];
                } catch (e) {
                    return [];
                }
            }

            function safeClassList(el, action, className) {
                try {
                    if (el && el.classList && el.classList[action]) {
                        el.classList[action](className);
                        return true;
                    }
                } catch (e) {}
                return false;
            }

            function safeListener(el, event, handler) {
                try {
                    if (el && el.addEventListener) {
                        el.addEventListener(event, handler);
                        return true;
                    }
                } catch (e) {}
                return false;
            }

            // Get elements safely
            elements.btn = safeGet('mobile-menu-btn');
            elements.btnSmall = safeGet('mobile-menu-btn-small');
            elements.menu = safeGet('mobile-menu');
            elements.overlay = safeGet('mobile-menu-overlay');
            elements.close = safeGet('mobile-menu-close');
            elements.main = safeGet('main-menu');

            // Initialize
            safeClassList(elements.menu, 'add', 'hidden');
            safeClassList(elements.menu, 'add', 'translate-x-full');
            safeClassList(elements.overlay, 'add', 'hidden');

            function openMenu() {
                try {
                    safeClassList(elements.menu, 'remove', 'hidden');
                    setTimeout(function() {
                        safeClassList(elements.menu, 'remove', 'translate-x-full');
                    }, 10);
                    safeClassList(elements.overlay, 'remove', 'hidden');
                    if (document.body) document.body.style.overflow = 'hidden';
                } catch (e) {}
            }

            function closeMenu() {
                try {
                    safeClassList(elements.menu, 'add', 'translate-x-full');
                    setTimeout(function() {
                        safeClassList(elements.menu, 'add', 'hidden');
                    }, 300);
                    safeClassList(elements.overlay, 'add', 'hidden');
                    if (document.body) document.body.style.overflow = '';
                } catch (e) {}
            }

            // Event listeners
            safeListener(elements.btn, 'click', function(e) {
                e.preventDefault();
                openMenu();
            });

            safeListener(elements.btnSmall, 'click', function(e) {
                e.preventDefault();
                openMenu();
            });

            safeListener(elements.close, 'click', function(e) {
                e.preventDefault();
                closeMenu();
            });

            safeListener(elements.overlay, 'click', function(e) {
                e.preventDefault();
                closeMenu();
            });

            // Submenu handling
            var menuItems = safeQueryAll('.mobile-menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                safeListener(menuItems[i], 'click', function(e) {
                    e.preventDefault();
                    var submenuName = this.dataset ? this.dataset.submenu : null;
                    if (submenuName) {
                        var submenu = safeGet('submenu-' + submenuName);
                        if (submenu) {
                            safeClassList(elements.main, 'add', 'hidden');
                            safeClassList(submenu, 'remove', 'hidden');
                        }
                    }
                });
            }

            var submenuBacks = safeQueryAll('.submenu-back');
            for (var i = 0; i < submenuBacks.length; i++) {
                safeListener(submenuBacks[i], 'click', function(e) {
                    e.preventDefault();
                    var parentName = this.dataset ? this.dataset.parent : null;
                    if (parentName) {
                        var submenu = safeGet('submenu-' + parentName);
                        if (submenu) {
                            safeClassList(submenu, 'add', 'hidden');
                            safeClassList(elements.main, 'remove', 'hidden');
                        }
                    }
                });
            }

            // Global listeners
            safeListener(window, 'resize', function() {
                if (window.innerWidth >= 1024) closeMenu();
            });

            safeListener(document, 'keydown', function(e) {
                if (e.key === 'Escape') closeMenu();
            });
        }

        // ✅ NOTIFICATION SYSTEM - Chỉ chạy khi authenticated
        function setupNotificationSystem() {
            console.log('🔔 Setting up notification system for authenticated user');

            // ✅ Safe notification loading with proper error handling
            function loadNotifications() {
                return fetch('/api/notifications?limit=10', {
                        method: 'GET',
                        credentials: 'same-origin',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': getCSRFToken()
                        }
                    })
                    .then(function(response) {
                        if (response.status === 401) {
                            console.log('🔕 Notification auth expired');
                            return {
                                data: []
                            };
                        }
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(function(data) {
                        return data.data || [];
                    })
                    .catch(function(error) {
                        console.warn('Notification load error:', error.message);
                        return [];
                    });
            }

            function updateNotificationBadge(count) {
                var badges = document.querySelectorAll('.notification-badge');
                badges.forEach(function(badge) {
                    if (count > 0) {
                        badge.textContent = count > 99 ? '99+' : count;
                        badge.classList.remove('hidden');
                    } else {
                        badge.classList.add('hidden');
                    }
                });
            }

            function getCSRFToken() {
                var token = document.querySelector('meta[name="csrf-token"]');
                return token ? token.getAttribute('content') : '';
            }

            // ✅ Load notifications on init
            loadNotifications()
                .then(function(notifications) {
                    if (notifications && notifications.length > 0) {
                        updateNotificationBadge(notifications.length);
                        console.log('🔔 Loaded ' + notifications.length + ' notifications');
                    } else {
                        console.log('🔕 No notifications found');
                    }
                });

            // ✅ Periodic refresh every 30 seconds (optional)
            setInterval(function() {
                loadNotifications().then(function(notifications) {
                    updateNotificationBadge(notifications.length);
                });
            }, 30000);
        }

        console.log('✅ Header with notification support loaded successfully');
    })();

