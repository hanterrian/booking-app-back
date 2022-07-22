<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\FrontProductRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FrontProductService
{
    public function __construct(private readonly FrontProductRepository $frontProductRepository)
    {
    }

    /**
     * @param  array  $input
     * @return Product[]|LengthAwarePaginator
     */
    public function getFrontList(array $input = []): LengthAwarePaginator
    {
        return $this->frontProductRepository->getFrontList($input);
    }
}
