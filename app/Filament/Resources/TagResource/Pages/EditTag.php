<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Models\Admin\AdminTag;
use App\Models\Tag;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

/**
 * @property AdminTag $record
 */
class EditTag extends EditRecord
{
    protected static string $resource = TagResource::class;

    public function beforeSave()
    {
        $this->record->slug = Str::slug($this->data['slug'] ?? '');
    }

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
