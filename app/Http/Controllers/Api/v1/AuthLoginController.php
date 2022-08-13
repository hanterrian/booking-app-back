<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\LoginFormRequest;
use App\Services\AdminAuthService;
use Illuminate\Validation\ValidationException;

class AuthLoginController extends Controller
{
    public function __construct(private readonly AdminAuthService $adminAuthService)
    {
    }

    public function __invoke(LoginFormRequest $request): array
    {
        $check = $this->adminAuthService->check($request);

        if (!$check) {
            throw ValidationException::withMessages([
                'email' => [
                    'The provided credentials are incorrect.',
                ],
            ]);
        }

        $token = $check->createToken($check->email.'.token')->plainTextToken;

        return [
            'token' => $token,
        ];
    }
}
