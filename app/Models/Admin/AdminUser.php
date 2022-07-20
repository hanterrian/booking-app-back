<?php

namespace App\Models\Admin;

use App\Models\User;
use Filament\Models\Contracts\FilamentUser;

/**
 * App\Models\Admin\AdminUser
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @mixin \Eloquent
 */
class AdminUser extends User implements FilamentUser
{
    public ?string $new_password = null;
    public ?string $new_password_confirmation = null;

    protected $primaryKey = 'uuid';

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_block',
        'block_to',
        'avatar_src',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'uuid' => 'string',
        'email_verified_at' => 'datetime',
        'is_block' => 'boolean',
        'block_to' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function canAccessFilament(): bool
    {
        return $this->hasRole('admin');
    }
}
