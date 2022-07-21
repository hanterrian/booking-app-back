<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Admin\AdminUser;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

/**
 * @property AdminUser $record
 */
class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function beforeCreate()
    {
        $this->record->password = Hash::make($this->data['password']);
    }
}
