<?php

namespace App\Models\Admin;

use App\Models\Author;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminAuthor
 *
 * @property string $uuid
 * @property string $name
 * @property string $slug
 * @property string|null $photo_src
 * @property int $sort
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminAuthor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor wherePhotoSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminAuthor whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|AdminAuthor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminAuthor withoutTrashed()
 * @mixin \Eloquent
 */
class AdminAuthor extends Author
{
    use HasSlug;

    protected $table = 'authors';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'name',
        'slug',
        'photo_src',
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
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
