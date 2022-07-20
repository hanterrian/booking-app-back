<?php

namespace App\Models\Admin;

use App\Models\Category;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory query()
 * @method static \Illuminate\Database\Query\Builder|AdminCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminCategory withoutTrashed()
 * @mixin \Eloquent
 */
class AdminCategory extends Category
{
    use HasSlug;

    protected $table = 'categories';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'title',
        'slug',
        'sort',
        'published',
    ];

    protected $casts = [
        'uuid' => 'string',
        'sort' => 'integer',
        'published' => 'boolean',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
