<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        /** @var User $user */
        $user = User::whereEmail($request->email)->first();

        if ($user && $user->hasRole('admin') && Hash::check($request->password, $user->password)) {
            Auth::login($user, true);

            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withErrors([
                'email' => [
                    'Credentials incorrect',
                ],
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.auth.login');
    }
}
