<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view()
    {
        $user = Auth::user();

        return view('profile.view', [
            'user' => $user,
        ]);
    }
}
