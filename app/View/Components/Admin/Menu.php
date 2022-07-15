<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    private array $items = [
        'admin.dashboard' => 'Home',
        'admin.category.index' => 'Category',
    ];

    public function render(): View
    {
        return view('components.admin.menu', ['items' => $this->items]);
    }
}
