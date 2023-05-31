<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Eco Shymkent') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <x-app-layout-styles></x-app-layout-styles>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    </head>
    <body class="font-sans antialiased">
    <section class="body">

        <!-- start: header -->
        @include("layouts.header")
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            @include("layouts.sidebar-left")
            <!-- end: sidebar -->
            <section role="main" class="content-body">
                @include("layouts.page-header")

                <!-- start: page -->
                {{$slot}}
                <!-- end: page -->
            </section>
        </div>


    </section>
        <x-app-layout-scripts></x-app-layout-scripts>

    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @livewireScripts
    @stack('js')
    <script type="module">
        Echo.join("user-presence");
    </script>
    @admin
    <script type="module">

        Echo.join("user-presence")
            .joining((user) => {
            toastr.info(user.name + " Подключился к платформе")
            })
            .leaving((user) => {
                toastr.info(user.name + " Отключился от платформы")
            });

    </script>
    @endadmin




    </body>
</html>
