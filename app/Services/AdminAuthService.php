<?php

namespace App\Services;

use App\Http\Requests\Api\v1\Auth\LoginFormRequest;
use App\Http\Requests\Api\v1\Auth\RegisterFormRequest;
use App\Models\User;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Hash;

class AdminAuthService
{
    public function __construct(private readonly AdminRepository $adminRepository)
    {
    }

    public function check(LoginFormRequest $request): false|User
    {
        $user = $this->adminRepository->find($request->email);

        if ($user && Hash::check($request->password, $user->password)) {
            return $user;
        }

        return false;
    }

    public function register(RegisterFormRequest $request): User
    {
        return $this->adminRepository->register($request);
    }
}
