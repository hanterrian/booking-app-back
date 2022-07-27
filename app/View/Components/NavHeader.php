<?php

namespace App\View\Components;

use App\Services\NavCategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavHeader extends Component
{
    public function __construct(private readonly NavCategoryService $navCategoryService)
    {
    }

    public function render(): View
    {
        $items = $this->navCategoryService->getList();

        return view('components.nav-header', [
            'items' => $items,
        ]);
    }
}
