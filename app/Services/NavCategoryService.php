<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\NavCategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class NavCategoryService
{
    public function __construct(private readonly NavCategoryRepository $navCategoryRepository)
    {
    }

    /**
     * @return Collection|array|Category[]
     */
    public function getList(): Collection|array
    {
        return $this->navCategoryRepository->getList();
    }
}
