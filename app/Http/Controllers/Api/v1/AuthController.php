<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\LoginFormRequest;
use App\Http\Requests\Api\v1\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginFormRequest $request): string
    {
        $user = User::firstOrFail(['email' => $request->email]);

        if (!$user && !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => [
                    'The provided credentials are incorrect.',
                ],
            ]);
        }

        return $user->createToken($user->email.'.token')->plainTextToken;
    }

    public function register(RegisterFormRequest $request)
    {

    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
