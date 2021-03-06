<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ __('Booking') }}</a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li>
                <a class="nav-link px-2" aria-current="page" href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>
        </ul>

        @auth
            <x-nav-profile/>
        @endauth

        @guest
            <livewire:navbar-search/>
            <livewire:nav-login-button/>
        @endguest
    </div>
</nav>
