<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Admin\AdminUser;
use Filament\Forms\Components\Card;
use Livewire\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Masterminds\HTML5\Parser\FileInputStream;

class UserResource extends Resource
{
    protected static ?string $model = AdminUser::class;

    protected static ?string $slug = 'users';

    protected static ?string $recordTitleAttribute = 'email';

    protected static ?string $navigationGroup = 'User';

    protected static ?string $label = 'Users';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 5;

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
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('password')
                                    ->password()
                                    ->required()
                                    ->maxLength(255)
                                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                    ->visible(fn(Component $livewire): bool => $livewire instanceof Pages\CreateUser),
                            ]),
                    ])
                    ->columnSpan(2),
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
                                FileUpload::make('avatar_src')
                                    ->disk('avatars')
                                    ->image()
                                    ->avatar(),
                            ]),

                        Card::make()
                            ->schema([
                                Placeholder::make('Change password'),

                                TextInput::make('new_password')
                                    ->password()
                                    ->rules([
                                        'min:6', 'nullable', 'confirmed',
                                    ])
                                    ->maxLength(255),

                                TextInput::make('new_password_confirmation')
                                    ->password()
                                    ->rules([
                                        'min:6', 'nullable',
                                    ])
                                    ->maxLength(255),
                            ])
                            ->visible(fn(Component $livewire): bool => $livewire instanceof Pages\EditUser),
                    ]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar_src')
                    ->disk('avatars'),

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
            ])
            ->defaultSort('created_at');
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
