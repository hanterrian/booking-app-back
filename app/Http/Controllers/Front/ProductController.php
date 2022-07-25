<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function view(Product $product)
    {
        return view('product.view', ['product' => $product]);
    }
}
