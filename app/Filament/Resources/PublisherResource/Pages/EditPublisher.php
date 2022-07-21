<?php

namespace App\Filament\Resources\PublisherResource\Pages;

use App\Filament\Resources\PublisherResource;
use App\Models\Admin\AdminPublisher;
use App\Models\Publisher;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

/**
 * @property AdminPublisher $record
 */
class EditPublisher extends EditRecord
{
    protected static string $resource = PublisherResource::class;

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
