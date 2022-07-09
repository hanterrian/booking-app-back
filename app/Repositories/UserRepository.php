<?php

namespace App\Repositories;

use App\Http\Requests\Api\v1\Auth\RegisterFormRequest;
use App\Models\User;

class UserRepository
{
    public function find(string $email): ?User
    {
        return User::first(['email' => $email]);
    }

    public function register(RegisterFormRequest $request): User
    {
        return User::create($request->all());
    }
}
