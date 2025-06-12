<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- JSVectorMap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone/dist/dropzone.css">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Tailwind CSS -->
    @vite(['resources/css/style.css', 'resources/js/app.js', 'resources/js/index.js'])

</head>

<body
    x-data="{ 
        page: 'ecommerce', 
        loaded: true, 
        darkMode: false, 
        stickyMenu: false, 
        sidebarToggle: false, 
        scrollTop: false 
    }"
    x-init="
        darkMode = JSON.parse(localStorage.getItem('darkMode'));
        $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))
    "
    :class="{'dark bg-gray-900': darkMode === true}">
    @include('admin.partials.preloader')

    <div class="flex h-screen overflow-hidden">
        @include('admin.partials.sidebar')

        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @include('admin.partials.overlay')
            @include('admin.partials.header')

            <main>
                @yield('content')
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

</body>

</html>