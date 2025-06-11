<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#2563eb">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Firebase Config -->
    <script>
        window.firebaseConfig = {
            apiKey: "{{ config('services.firebase.api_key', '') }}",
            authDomain: "{{ config('services.firebase.auth_domain', '') }}",
            projectId: "{{ config('services.firebase.project_id', '') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket', '') }}",
            messagingSenderId: "{{ config('services.firebase.messaging_sender_id', '') }}",
            appId: "{{ config('services.firebase.app_id', '') }}"
        };
    </script>
</head>

<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
    <!-- Loading Overlay -->
    <div id="globalLoading" class="fixed inset-0 bg-white bg-opacity-90 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="text-center">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-4 border-blue-600 mb-4"></div>
                <p class="text-gray-600 text-lg">Đang tải...</p>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        <!-- Logo Section -->
        <div class="mb-8">
            <a href="{{ url('/') }}" class="flex items-center justify-center">
                <img src="{{ asset('storage/logo.png') }}" alt="{{ config('app.name') }}"
                    class="h-16 w-auto drop-shadow-md hover:scale-105 transition-transform duration-200"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <div class="hidden">
                    <div class="h-16 w-16 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-xl">{{ substr(config('app.name', 'L'), 0, 1) }}</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Container -->
        <div class="w-full sm:max-w-md bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            <!-- Card Header Background -->
            <div class="h-2 bg-gradient-to-r from-blue-500 to-indigo-600"></div>

            <!-- Card Content -->
            <div class="px-8 py-8">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-8 text-center text-sm text-gray-500 space-y-2">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="hover:text-blue-600 transition-colors duration-200">Điều khoản</a>
                <span>•</span>
                <a href="#" class="hover:text-blue-600 transition-colors duration-200">Bảo mật</a>
                <span>•</span>
                <a href="#" class="hover:text-blue-600 transition-colors duration-200">Hỗ trợ</a>
            </div>
        </footer>
    </div>

    <!-- Toast Notification Container -->
    <div id="toastContainer" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- Firebase SDK và Scripts -->
    <script type="module">
        // Import Firebase modules
        import {
            initializeApp
        } from 'https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js';
        import {
            getAuth,
            signInAnonymously,
            onAuthStateChanged
        } from 'https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js';

        // Initialize Firebase nếu có config
        let app, auth;
        if (window.firebaseConfig && window.firebaseConfig.apiKey) {
            try {
                app = initializeApp(window.firebaseConfig);
                auth = getAuth(app);

                // Expose cho global use
                window.firebase = {
                    app,
                    auth,
                    signInAnonymously,
                    onAuthStateChanged
                };

                console.log('🔥 Firebase initialized successfully');
            } catch (error) {
                console.warn('⚠️ Firebase initialization failed:', error);
                window.firebase = null;
            }
        } else {
            console.warn('⚠️ Firebase config not found');
            window.firebase = null;
        }

        // Global utility functions
        window.utils = {
            // Show loading overlay
            showLoading() {
                document.getElementById('globalLoading').classList.remove('hidden');
            },

            // Hide loading overlay
            hideLoading() {
                document.getElementById('globalLoading').classList.add('hidden');
            },

            // Show toast notification
            showToast(message, type = 'info') {
                const toastContainer = document.getElementById('toastContainer');
                const toast = document.createElement('div');

                const bgColors = {
                    success: 'bg-green-500',
                    error: 'bg-red-500',
                    warning: 'bg-yellow-500',
                    info: 'bg-blue-500'
                };

                toast.className = `${bgColors[type]} text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full opacity-0`;
                toast.innerHTML = `
                        <div class="flex items-center space-x-2">
                            <span>${message}</span>
                            <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-white hover:text-gray-200">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    `;

                toastContainer.appendChild(toast);

                // Animate in
                setTimeout(() => {
                    toast.classList.remove('translate-x-full', 'opacity-0');
                }, 100);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (toast.parentElement) {
                        toast.classList.add('translate-x-full', 'opacity-0');
                        setTimeout(() => toast.remove(), 300);
                    }
                }, 5000);
            },

            // Get device info
            getDeviceInfo() {
                const userAgent = navigator.userAgent;
                let device = 'Web';

                if (/Android/i.test(userAgent)) {
                    device = 'Android';
                } else if (/iPhone|iPad|iPod/i.test(userAgent)) {
                    device = 'iOS';
                } else if (/Windows/i.test(userAgent)) {
                    device = 'Windows';
                } else if (/Mac/i.test(userAgent)) {
                    device = 'Mac';
                }

                return device;
            },

            // Get Firebase token
            async getFirebaseToken() {
                if (!window.firebase) {
                    return '';
                }

                try {
                    // Sign in anonymously nếu chưa có user
                    if (!window.firebase.auth.currentUser) {
                        await window.firebase.signInAnonymously(window.firebase.auth);
                    }

                    // Get fresh token
                    const user = window.firebase.auth.currentUser;
                    if (user) {
                        return await user.getIdToken(true);
                    }
                } catch (error) {
                    console.warn('Firebase token error:', error);
                }

                return '';
            }
        };

        // Initialize Firebase auth nếu có
        if (window.firebase) {
            window.firebase.signInAnonymously(window.firebase.auth).catch(console.warn);
        }
    </script>

    <!-- Additional page-specific scripts -->
    @stack('scripts')
</body>

</html>