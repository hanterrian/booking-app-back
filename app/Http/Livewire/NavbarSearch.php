<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class NavbarSearch extends Component
{
    public ?string $search = null;

    public function search(): void
    {

    }

    public function render(): Factory|View|Application
    {
        return view('livewire.navbar-search');
    }
}
