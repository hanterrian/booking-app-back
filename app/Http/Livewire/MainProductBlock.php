<?php

namespace App\Http\Livewire;

use App\Services\FrontProductService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MainProductBlock extends Component
{
    private readonly FrontProductService $frontProductService;

    protected $rules = [
        'author' => ['nullable', 'max:255'],
        'publisher' => ['nullable', 'max:255'],
        'category' => ['nullable', 'max:255'],
        'tag' => ['nullable', 'max:255'],
    ];

    /**
     * @throws BindingResolutionException
     */
    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->frontProductService = app()->make(FrontProductService::class);
    }

    public function filter()
    {

    }

    public function render(): Factory|View|Application
    {
        $items = $this->frontProductService->getFrontList($this->all());

        return view('livewire.main-product-block', ['items' => $items]);
    }
}
