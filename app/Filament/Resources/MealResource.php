<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MealResource\Pages;
use App\Filament\Resources\MealResource\RelationManagers;
use App\Models\Meal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MealResource extends Resource
{
    protected static ?string $model = Meal::class;

    protected static ?string $activeNavigationIcon = 'heroicon-s-cake';
    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Name')),
                Forms\Components\TextInput::make('unit')
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Unit')),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Name (English)')),
                Forms\Components\TextInput::make('unit_en')
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Unit (English)')),
                Forms\Components\TextInput::make('batch_size')
                    ->required()
                    ->maxValue(255)
                    ->placeholder(__('Batch Size')),
                Forms\Components\TextInput::make('expiry_duration')
                    ->required()
                    ->maxValue(255)
                    ->placeholder(__('Expiry Duration')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(__('name_en'))
                    ->searchable()
                    ->sortable()
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make(__('unit_en'))
                    ->searchable()
                    ->sortable()
                    ->label(__('Unit')),
                Tables\Columns\TextColumn::make('batch_size')
                    ->searchable()
                    ->sortable()
                    ->label(__('Batch Size')),
                Tables\Columns\TextColumn::make('expiry_duration')
                    ->searchable()
                    ->sortable()
                    ->label(__('Expiry Duration') . ' (' . __('hour') . ')'),
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
            RelationManagers\MealItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeals::route('/'),
            'create' => Pages\CreateMeal::route('/create'),
            'edit' => Pages\EditMeal::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('Meal');
    }

    public static function getpluralLabel(): string
    {
        return __('Meals');
    }
}
