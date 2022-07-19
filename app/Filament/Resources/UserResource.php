<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $recordTitleAttribute = 'email';

//    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->required()
                                    ->maxLength(255),
                            ]),

                        Card::make()
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('avatar_src')
                                    ->collection('avatars')
                                    ->multiple(false),
                            ])
                            ->columns(1),
                    ]),
                Group::make()
                    ->schema([
                        Card::make()
                            ->schema([
                                Placeholder::make('Blocking'),

                                Toggle::make('is_block'),

                                DatePicker::make('block_to'),
                            ]),

                        Card::make()
                            ->schema([
                                Placeholder::make('Change password'),

                                TextInput::make('new_password')
                                    ->maxLength(255),

                                TextInput::make('password_repeat')
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uuid')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),

                BooleanColumn::make('is_block')
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('block_to')
                    ->date()
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }
}
