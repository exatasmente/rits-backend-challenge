<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} - @yield('title') </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>
<body >
<div class="h-screen flex overflow-hidden">
    @auth
        @include('menu')
    @endauth
    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none mb-10 md:mb-0" tabindex="0">
        @auth
            <livewire:notification-tracker></livewire:notification-tracker>
        @endauth
        <div class="m-auto px-4">
            @yield('content')
        </div>

    </main>
</div>
@livewireScripts
</body>
</html>
