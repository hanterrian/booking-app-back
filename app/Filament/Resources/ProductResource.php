<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Admin\AdminProduct;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component;

class ProductResource extends Resource
{
    protected static ?string $model = AdminProduct::class;

    protected static ?string $slug = 'products';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $label = 'Product';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('slug')
                                    ->disabled(fn (Component $livewire): bool => $livewire instanceof Pages\CreateProduct)
                                    ->maxLength(255),

                                Forms\Components\MarkdownEditor::make('description'),
                            ]),

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Placeholder::make('Pricing'),

                                Forms\Components\TextInput::make('price')
                                    ->numeric()
                                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                                    ->required(),
                            ]),

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Placeholder::make('Inventory'),

                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU (Stock Keeping Unit)')
                                    ->unique(Product::class, 'sku', fn ($record) => $record)
                                    ->required(),

                                Forms\Components\TextInput::make('stock')
                                    ->label('Stock')
                                    ->numeric()
                                    ->rules(['integer', 'min:0'])
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(2),
                Group::make()
                    ->schema([

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Select::make('publisher')
                                    ->relationship('publisher', 'title')
                                    ->required(),

                                Forms\Components\MultiSelect::make('authors')
                                    ->relationship('authors', 'name')
                                    ->required(),

                                Forms\Components\Select::make('category')
                                    ->relationship('category', 'title')
                                    ->required(),

                                Forms\Components\MultiSelect::make('tags')
                                    ->relationship('tags', 'title')
                                    ->required(),
                            ]),

                        Forms\Components\Card::make()
                            ->schema([
                                FileUpload::make('thumbnail_src')
                                    ->label('Thumbnail')
                                    ->disk('products')
                                    ->image(),
                            ]),

                        Forms\Components\Card::make()
                            ->schema([
                                Placeholder::make('Settings'),

                                Forms\Components\TextInput::make('sort')
                                    ->required()
                                    ->default(0),

                                Forms\Components\Toggle::make('published')
                                    ->default(true)
                                    ->required(),
                            ]),
                    ]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('publisher.title')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('authors.name')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.title')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tags.title')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                ImageColumn::make('thumbnail_src')
                    ->disk('products')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->toggleable()
                    ->sortable()
                    ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('sort')
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\BooleanColumn::make('published')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable()
                    ->sortable()
                    ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable()
                    ->sortable()
                    ->toggledHiddenByDefault(),
            ])
            ->defaultSort('created_at')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        /** @var AdminProduct $record */
        return [
            'Publisher' => optional($record->publisher)->title,
            'Category' => optional($record->category)->title,
        ];
    }

    protected static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()
            ->with(['publisher', 'authors', 'category', 'tags']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'sku', 'publisher', 'category'];
    }
}
