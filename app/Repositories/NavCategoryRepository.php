<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class NavCategoryRepository
{
    /**
     * @return Collection|array|Category[]
     */
    public function getList(): Collection|array
    {
        return Category::list()->get();
    }
}
