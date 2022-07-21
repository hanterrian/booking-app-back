<?php

namespace App\Models\Admin;

use App\Models\Publisher;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Admin\AdminPublisher
 *
 * @property string $uuid
 * @property string $title
 * @property string $slug
 * @property string|null $logo_src
 * @property int $sort
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminPublisher onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereLogoSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPublisher whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|AdminPublisher withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminPublisher withoutTrashed()
 * @mixin \Eloquent
 */
class AdminPublisher extends Publisher
{
    use HasSlug;

    protected $table = 'publishers';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'title',
        'slug',
        'logo_src',
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
