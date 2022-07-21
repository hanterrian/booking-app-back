<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Publisher
 *
 * @property string $uuid
 * @property string $title
 * @property string $slug
 * @property string|null $logo_src
 * @property int $sort
 * @property int $published
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newQuery()
 * @method static \Illuminate\Database\Query\Builder|Publisher onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereLogoSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Publisher withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Publisher withoutTrashed()
 * @mixin \Eloquent
 */
class Publisher extends Model
{
    use Uuid, SoftDeletes;

    protected $primaryKey = 'uuid';

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
