<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LogoutNavItem extends Component
{
    public function logout(): void
    {
        auth()->logout();

        redirect()->route('home');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.logout-nav-item');
    }
}
