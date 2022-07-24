<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [
        'publisher' => ['title'],
        'authors' => ['name'],
        'category' => ['title'],
        'tags' => ['title'],
    ];

    public function author()
    {
        $this->whereHas('authors', function ($q) {
            $q->where('slug', '=', $this->input('author'));
        });
    }

    public function publisher()
    {
        $this->whereHas('publisher', function ($q) {
            $q->where('slug', '=', $this->input('publisher'));
        });
    }

    public function category()
    {
        $this->whereHas('category', function ($q) {
            $q->where('slug', '=', $this->input('category'));
        });
    }

    public function tag()
    {
        $this->whereHas('tags', function ($q) {
            $q->where('slug', '=', $this->input('tag'));
        });
    }
}
