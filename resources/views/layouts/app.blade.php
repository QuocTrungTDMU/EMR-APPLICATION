<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <style>
        img:is([sizes="auto" i], [sizes^="auto," i]) {
            contain-intrinsic-size: 3000px 1500px
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @yield('head')
</head>

<body class="font-sans antialiased overflow-x-hidden">
    @include('partials.header')

    @if (!request()->is('contact') && !request()->is('profile*') && !request()->is('blogs*') && !request()->is('blog-detail*') && !request()->is('cart*') && !request()->is('checkout*'))
    @include('partials.hero-slider')
    @endif

    <div class="min-h-screen">
        @include('layouts.navigation')

        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main>
            @yield('content')
        </main>
    </div>

    @include('partials.product-quick-view-modal')
    @include('partials.footer')

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