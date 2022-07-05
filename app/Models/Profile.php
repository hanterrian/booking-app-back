<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Profile
 *
 * @property string $user_uuid
 * @property string|null $avatar
 * @property string|null $birthday
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserUuid($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use Uuid;

    protected $primaryKey = 'user_uuid';

    public $timestamps = false;

    protected $casts = [
        'user_uuid' => 'string',
    ];
}
