<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Admin\AdminProduct;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    public function beforeBulkDelete()
    {
        /** @var AdminProduct[]|Collection $records */
        $records = $this->getSelectedTableRecords();

        $records->each(fn (Model $record) => $record->deleteThumbnail());
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
