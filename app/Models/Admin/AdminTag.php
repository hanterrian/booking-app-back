<?php

namespace App\Models\Admin;

use App\Models\Tag;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminTag
 *
 * @property string $uuid
 * @property string|null $category_uuid
 * @property string $title
 * @property string $slug
 * @property int $sort
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminTag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereCategoryUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminTag whereUuid($value)
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
