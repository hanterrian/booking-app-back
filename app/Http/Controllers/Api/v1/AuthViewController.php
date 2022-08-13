<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserViewResource;
use App\Services\AdminAuthService;

class AuthViewController extends Controller
{
    public function __construct(private readonly AdminAuthService $adminAuthService)
    {
    }

    public function __invoke(): UserViewResource
    {
        return new UserViewResource($this->adminAuthService->getUser());
    }
}
