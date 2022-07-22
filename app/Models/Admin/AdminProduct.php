<?php

namespace App\Models\Admin;

use App\Models\Author;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminProduct
 *
 * @property string $uuid
 * @property string|null $publisher_uuid
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
 * @property-read \Illuminate\Database\Eloquent\Collection|Author[] $authors
 * @property-read int|null $authors_count
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Publisher|null $publisher
 * @property-read \Illuminate\Database\Eloquent\Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereCategoryUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct wherePublisherUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereThumbnailSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProduct whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|AdminProduct withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminProduct withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Product filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLike($column, $value, $boolean = 'and')
 * @property-read mixed $thumbnail
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
        'publisher_uuid',
        'category_uuid',
        'description',
        'stock',
        'thumbnail_src',
        'price',
        'sort',
        'published',
    ];

    protected $casts = [
        'uuid' => 'string',
        'publisher_uuid' => 'string',
        'category_uuid' => 'string',
        'stock' => 'integer',
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

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_product', 'product_uuid', 'author_uuid');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_product', 'product_uuid', 'tag_uuid');
    }
}
