<?php

namespace App\Models\Admin;

use App\Models\Tag;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminTag
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminTag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag query()
 * @method static \Illuminate\Database\Query\Builder|AdminTag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminTag withoutTrashed()
 * @mixin \Eloquent
 */
class AdminTag extends Tag
{
    use HasSlug;

    protected $table = 'tags';

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
