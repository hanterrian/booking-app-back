<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Tag;
use App\Services\FrontProductService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MainProductBlock extends Component
{
    private readonly FrontProductService $frontProductService;

    public ?string $author = null;
    public ?string $publisher = null;
    public ?string $category = null;
    public ?string $tag = null;

    public bool $filtered = false;

    protected $rules = [
        'author' => ['nullable', 'string'],
        'publisher' => ['nullable', 'string'],
        'category' => ['nullable', 'string'],
        'tag' => ['nullable', 'string'],
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
        $this->filtered = true;
    }

    public function resetFilter()
    {
        $this->reset(['author', 'publisher', 'category', 'tag']);

        $this->filtered = false;
    }

    public function render(): Factory|View|Application
    {
        $categories = Category::wherePublished(true)->orderBy('sort')->pluck('title', 'slug');
        $publishers = Publisher::wherePublished(true)->orderBy('sort')->pluck('title', 'slug');
        $authors = Author::wherePublished(true)->orderBy('sort')->pluck('name', 'slug');
        $tags = Tag::wherePublished(true)->orderBy('sort')->pluck('title', 'slug');

        $items = $this->frontProductService->getFrontList($this->all());

        return view('livewire.main-product-block', [
            'categories' => $categories,
            'publishers' => $publishers,
            'authors' => $authors,
            'tags' => $tags,
            'filtered' => $this->filtered,
            'items' => $items,
        ]);
    }
}
