<?php

namespace App\Http\Livewire\Popup;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LoginPopupForm extends Component
{
    public ?string $email = null;
    public ?string $password = null;
    public bool $rememberMe = false;

    public function login(): void
    {

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.popup.login-popup-form');
    }
}
