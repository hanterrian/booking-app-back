<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class MainController extends Controller
{
    public function index()
    {
        SEOTools::setTitle(__('Home'));

        return view('main.index');
    }
}
