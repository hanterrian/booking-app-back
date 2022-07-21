<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use App\Models\Author;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

/**
 * @property Author $record
 */
class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;

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
