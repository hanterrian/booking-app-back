<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\RegisterFormRequest;
use App\Http\Resources\AuthRegisterUserResource;
use App\Services\AdminAuthService;

class AuthRegisterController extends Controller
{
    public function __construct(private readonly AdminAuthService $adminAuthService)
    {
    }

    public function __invoke(RegisterFormRequest $request): AuthRegisterUserResource
    {
        $user = $this->adminAuthService->register($request);

        return new AuthRegisterUserResource($user);
    }
}
