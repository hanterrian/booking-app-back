<?php

namespace App\Models\Admin;

use App\Models\Category;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminCategory
 *
 * @property string $uuid
 * @property string $title
 * @property string $slug
 * @property int $sort
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminCategory whereUuid($value)
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
