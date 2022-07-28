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

    protected $rules = [
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'min:6', 'max:255'],
        'rememberMe' => ['bool'],
    ];

    public function login(): void
    {
        $this->validate();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.popup.login-popup-form');
    }
}
