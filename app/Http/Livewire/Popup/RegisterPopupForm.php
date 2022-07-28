<?php

namespace App\Http\Livewire\Popup;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RegisterPopupForm extends Component
{
    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $password_confirmation = null;
    public bool $accept = false;

    protected $rules = [
        'name' => ['required', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'min:6', 'max:255', 'confirmed'],
        'password_confirmation' => ['required', 'min:6', 'max:255'],
        'accept' => ['required', 'bool'],
    ];

    public function register(): void
    {
        $this->validate();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.popup.register-popup-form');
    }
}
