<?php

namespace App\Models\Admin;

use App\Models\Product;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminProduct
 *
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct query()
 * @method static \Illuminate\Database\Query\Builder|AdminProduct withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminProduct withoutTrashed()
 * @mixin \Eloquent
 * @property string $uuid
 * @property string|null $author_uuid
 * @property string|null $category_uuid
 * @property string $title
 * @property string $slug
 * @property string $sku
 * @property string|null $description
 * @property int $stock
 * @property string|null $thumbnail_src
 * @property string $price
 * @property int $sort
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereAuthorUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereCategoryUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereThumbnailSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereUuid($value)
 * @property string|null $publisher_uuid
 * @property-read \App\Models\Author|null $author
 * @property-read \App\Models\Publisher|null $publisher
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct wherePublisherUuid($value)
 */
class AdminProduct extends Product
{
    use HasSlug;

    protected $table = 'products';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'title',
        'slug',
        'sku',
        'description',
        'stock',
        'thumbnail_src',
        'price',
        'sort',
        'published',
    ];

    protected $casts = [
        'uuid' => 'string',
        'stock' => 'integer',
        'price' => 'decimal',
        'sort' => 'integer',
        'published' => 'boolean',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['title', 'sku'])
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
