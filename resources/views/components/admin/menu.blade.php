<div class="d-flex flex-column flex-shrink-0 p-3 col-3">
    <ul class="nav nav-pills flex-column">

        @foreach($items as $route => $label)
            <li class="nav-item">
                <a class="nav-link @if(Route::currentRouteName() == $route) active @endif" href="{{ route($route) }}">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
