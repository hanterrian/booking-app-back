<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! SEO::generate() !!}

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles

    <!-- Scripts -->
    @livewireScripts

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

<div class="container-fluid">
    <x-nav-header/>

    @yield('content')
</div>

</body>
</html>
