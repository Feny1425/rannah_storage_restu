<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $activeNavigationIcon = 'heroicon-s-user';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?int $navigationSort = -10;

    public static function getNavigationGroup(): ?string
    {
        return __(config('filament-spatie-roles-permissions.navigation_section_group', 'filament-spatie-roles-permissions::filament-spatie.section.roles_and_permissions'));
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('User Name'))
                    ->label(__('Name')),
                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->required()
                    ->email()
                    ->placeholder(__('Email')),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->password()
                    ->placeholder(__('User Password'))
                    ->label(__('Password')),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('roles', 'name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.roles')),
                Forms\Components\Select::make('permissions')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('permissions', 'name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.permissions')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label(__('Email')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\BranchesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('User');
    }

    public static function getpluralLabel(): string
    {
        return __('Users');
    }
}
