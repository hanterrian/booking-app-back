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
    public ?string $password_confirm = null;
    public bool $accept = false;

    public function register(): void
    {

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.popup.register-popup-form');
    }
}
