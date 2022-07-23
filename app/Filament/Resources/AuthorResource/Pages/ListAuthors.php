<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use App\Models\Admin\AdminAuthor;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;

    public function beforeBulkDelete()
    {
        /** @var AdminAuthor[]|Collection $records */
        $records = $this->getSelectedTableRecords();

        $records->each(fn (Model $record) => $record->deletePhoto());
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
