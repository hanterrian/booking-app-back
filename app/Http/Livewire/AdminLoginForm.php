<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminLoginForm extends Component
{
    public $user;

    public $email;

    public $password;

    public function render()
    {
        return view('livewire.admin-login-form');
    }

    private function resetForm()
    {
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $this->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        /** @var User $user */
        $user = User::whereEmail($this->email)->first();

        if ($user && $user->hasRole('admin') && Hash::check($this->password, $user->password)) {
            Auth::login($user, true);

            session()->flash('success', 'Successful login');

            $this->redirectRoute('admin.dashboard');
        } else {
            session()->flash('error', 'Credentials incorrect');
        }
    }
}
