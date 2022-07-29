<?php

namespace App\Http\Livewire\Popup;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function login()
    {
        $this->validate();

        /** @var User $user */
        $user = User::whereEmail($this->email)->first();

        if (!$user) {
            $this->addError('email', __('Incorrect credentials'));
        }

        if ($user && Hash::check($this->password, $user->password)) {
            Auth::login($user, $this->rememberMe);

            return redirect()->route('home');
        } else {
            $this->addError('email', __('Incorrect credentials'));
        }
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.popup.login-popup-form');
    }
}
