<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FrontProductRepository
{
    /**
     * @param  array  $input
     * @return Product[]|LengthAwarePaginator
     */
    public function getFrontList(array $input = []): LengthAwarePaginator
    {
        return Product::filter($input)->paginate();
    }
}
