<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\AdminAuthService;
use Illuminate\Support\Facades\Auth;

class AuthLogoutController extends Controller
{
    public function __invoke(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
