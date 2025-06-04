<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script>
        document.documentElement.className = document.documentElement.className + ' yes-js js_active js'
    </script>
    <title>Medik &#8211; Just another WordPress site</title>
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
    @vite(['resources/js/app.js'])
    @stack('styles')
    @yield('head')

</head>

<body>
    @include('partials.header')
    @include('partials.hero-slider')


    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    @stack('scripts')
</body>

</html>