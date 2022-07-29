<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NavProfile extends Component
{
    public function render(): View
    {
        $user = Auth::user();

        return view('components.nav-profile', [
            'user' => $user,
        ]);
    }
}
