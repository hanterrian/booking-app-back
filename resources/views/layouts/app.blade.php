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

    <div class="modal fade" id="loginPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <livewire:popup.login-popup-form/>
        </div>
    </div>

    <div class="modal fade" id="registerPopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <livewire:popup.register-popup-form/>
        </div>
    </div>

</div>

</body>
</html>
