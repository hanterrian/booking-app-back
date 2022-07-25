<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function view(Product $product)
    {
        SEOTools::setTitle($product->title)
            ->addImages(URL::to($product->thumbnail));

        return view('product.view', ['product' => $product]);
    }
}
