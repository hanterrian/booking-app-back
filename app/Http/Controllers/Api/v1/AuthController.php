<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\LoginFormRequest;
use App\Http\Requests\Api\v1\Auth\RegisterFormRequest;
use App\Http\Resources\AuthRegisterUserResource;
use App\Http\Resources\UserViewResource;
use App\Models\User;
use App\Services\AdminAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(private readonly AdminAuthService $adminAuthService)
    {
    }

    public function view(): UserViewResource
    {
        return new UserViewResource($this->adminAuthService->getUser());
    }

    public function login(LoginFormRequest $request): string
    {
        $check = $this->adminAuthService->check($request);

        if (!$check) {
            throw ValidationException::withMessages([
                'email' => [
                    'The provided credentials are incorrect.',
                ],
            ]);
        }

        return $check->createToken($check->email.'.token')->plainTextToken;
    }

    public function register(RegisterFormRequest $request): AuthRegisterUserResource
    {
        $user = $this->adminAuthService->register($request);

        return new AuthRegisterUserResource($user);
    }

    public function logout(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
