<?php

namespace App\Models;

use App\Models\Traits\Uuid;

/**
 * App\Models\SettingsProperty
 *
 * @property string $uuid
 * @property string $group
 * @property string $name
 * @property bool $locked
 * @property mixed $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingsProperty whereUuid($value)
 * @mixin \Eloquent
 */
class SettingsProperty extends \Spatie\LaravelSettings\Models\SettingsProperty
{
    use Uuid;

    protected $primaryKey = 'uuid';

    protected $table = 'settings';

    protected $guarded = [];

    protected $casts = [
        'locked' => 'boolean',
    ];
}
