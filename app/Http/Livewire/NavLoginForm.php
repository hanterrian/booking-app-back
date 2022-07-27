<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class NavLoginForm extends Component
{
    public ?string $name = null;
    public ?string $password = null;
    public bool $remember = false;

    public function login(): void
    {
        
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.nav-login-form');
    }
}
