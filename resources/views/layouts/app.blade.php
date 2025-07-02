<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Medik &#8211; Just another WordPress site')</title>
    <link rel="shortcut icon" href="https://medik.wpenginepowered.com/wp-content/themes/medik/images/favicon.ico" type="image/x-icon" />
    <meta name='robots' content='max-image-preview:large' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="alternate" type="application/rss+xml" title="Medik &raquo; Feed" href="https://medik.wpengine.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Medik &raquo; Comments Feed" href="https://medik.wpengine.com/comments/feed/" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        img:is([sizes="auto" i], [sizes^="auto," i]) {
            contain-intrinsic-size: 3000px 1500px
        }
    </style>

    <!-- ✅ FontAwesome 6.0 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all" />
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css" type="text/css" media="all" />
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="assets/css/flaticon.css" type="text/css" media="all" />
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="assets/css/theme-default.css" type="text/css" media="all" />
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css" type="text/css" media="all" />
    <!-- venobox CSS -->
    <link rel="stylesheet" href="venobox/venobox.css" type="text/css" media="all" />
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css" type="text/css" media="all" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/odometer-theme-default.css" />
    <!-- responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/swiper.min.css" />
    <!-- modernizr js -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/clash-display" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/aos.css" />




    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/notifications.css'])
    @stack('styles')
    @yield('head')
</head>

<!-- ✅ FIXED: Thêm min-h-screen và đảm bảo flexbox layout đúng -->

<body class="font-sans antialiased min-h-screen flex flex-col">

    <!-- ✅ Header -->
    @include('partials.header')

    <!-- ✅ Floating Contact Component -->
    @include('components.floating-contact', [
    'messengerLink' => 'https://m.me/medik.fanpage',
    'messengerText' => 'Chat với Medik qua Messenger',
    'zaloLink' => 'https://zalo.me/medik.official',
    'zaloText' => 'Liên hệ Medik qua Zalo',
    'phoneNumber' => '+84123456789',
    'phoneText' => 'Hotline: 0123 456 789'
    ])

    <!-- ✅ Main Content Area - flex-1 để đẩy footer xuống đáy -->
    <div class="flex-1">
        @include('layouts.navigation')

        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main class="flex-grow min-h-[calc(100vh-100px)]">
            @yield('content')
        </main>
    </div>


    @include('partials.footer')


    <!-- ✅ Toast Notifications Container -->
    @include('components.notifications.toast')

    <!-- ✅ JavaScript Libraries -->
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/ScrollSmoother.min.js"></script>
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/vendor/jquery-3.6.2.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="venobox/venobox.js"></script>
    <script src="venobox/venobox.min.js"></script>
    <script src="assets/js/jquery.meanmenu.js"></script>
    <script src="assets/js/jquery.scrollUp.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/jquery.barfiller.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/my.js"></script>

    <!-- ✅ AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- ✅ Initialize AOS -->
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            offset: 300,
        });
    </script>

    <!-- ✅ Flash Messages as Toast Notifications -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Đợi notification.js load xong
            setTimeout(() => {
                @if(session('success'))
                const successMessage = {
                    !!json_encode(session('success')) !!
                };
                if (typeof showSuccessToast === 'function') {
                    showSuccessToast('Success', successMessage);
                } else {
                    console.warn('showSuccessToast function not available');
                }
                @endif

                @if(session('error'))
                const errorMessage = {
                    !!json_encode(session('error')) !!
                };
                if (typeof showErrorToast === 'function') {
                    showErrorToast('Error', errorMessage);
                } else {
                    console.warn('showErrorToast function not available');
                }
                @endif

                @if(session('warning'))
                const warningMessage = {
                    !!json_encode(session('warning')) !!
                };
                if (typeof showWarningToast === 'function') {
                    showWarningToast('Warning', warningMessage);
                } else {
                    console.warn('showWarningToast function not available');
                }
                @endif

                @if(session('info'))
                const infoMessage = {
                    !!json_encode(session('info')) !!
                };
                if (typeof showInfoToast === 'function') {
                    showInfoToast('Info', infoMessage);
                } else {
                    console.warn('showInfoToast function not available');
                }
                @endif
            }, 200);
        });
    </script>

    <!-- ✅ Additional Scripts Stack -->
    @stack('scripts')

</body>

</html>