<?php

namespace App\Services;

use App\Http\Requests\Api\v1\Auth\LoginFormRequest;
use App\Http\Requests\Api\v1\Auth\RegisterFormRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserAuthService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function check(LoginFormRequest $request): false|User
    {
        $user = $this->userRepository->find($request->email);

        if ($user && Hash::check($request->password, $user->password)) {
            return $user;
        }

        return false;
    }

    public function register(RegisterFormRequest $request): User
    {
        return $this->userRepository->register($request);
    }
}
