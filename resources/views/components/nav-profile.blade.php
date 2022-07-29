<div class="dropdown text-end">
    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small">
        <li>
            <a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <livewire:logout-nav-item/>
        </li>
    </ul>
</div>
