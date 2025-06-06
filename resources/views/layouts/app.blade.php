<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script>
            document.documentElement.className = document.documentElement.className + ' yes-js js_active js'
        </script>
        <title>@yield('title', 'Medik &#8211; Just another WordPress site')</title>
        <link href='https://medik.wpenginepowered.com/wp-content/themes/medik/images/favicon.ico' rel='shortcut icon' type='image/x-icon' />
        <meta name='robots' content='max-image-preview:large' />
        <style>
            img:is([sizes="auto" i], [sizes^="auto," i]) {
                contain-intrinsic-size: 3000px 1500px
            }
        </style>
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        <link rel="alternate" type="application/rss+xml" title="Medik &raquo; Feed" href="https://medik.wpengine.com/feed/" />
        <link rel="alternate" type="application/rss+xml" title="Medik &raquo; Comments Feed" href="https://medik.wpengine.com/comments/feed/" />
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        @vite(['resources/js/app.js'])
        @stack('styles')
        @yield('head')

    </head>

<body>
    @include('partials.header')

    @if (!request()->is('contact') && !request()->is('profile*'))
    @include('partials.hero-slider')
    @endif




    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        @include('partials.product-quick-view-modal')
        @include('partials.footer')
        <!-- AOS JavaScript -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                offset: 300,

            });
        </script>
        @stack('scripts')
    </body>

</html>