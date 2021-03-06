<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Admin\AdminCategory;
use App\Models\Category;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

/**
 * @property AdminCategory $record
 */
class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    public function beforeSave()
    {
        $this->record->slug = Str::slug($this->data['slug'] ?? '');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
