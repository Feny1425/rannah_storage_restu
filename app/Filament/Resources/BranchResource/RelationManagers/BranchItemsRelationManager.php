<?php

namespace App\Filament\Resources\BranchResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'branch_items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->type('number')
                    ->minValue(0)
                    ->maxValue(999999999)
                    ->placeholder(__('Item Quantity')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('item.name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('item.unit')
                    ->label(__('Unit'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label(__('Quantity'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
<<<<<<< HEAD
    public static function getModelLabel(): string
    {
        return __('Branch Item');
    }
    public static function getModelpluralLabel(): string
=======
    
    public static function getLabel(): string
    {
        return __('Branch Item');
    }
    public static function getpluralLabel(): string
>>>>>>> bc74953e3db6959d3897888b372d3e20f4a72239
    {
        return __('Branch Items');
    }
}
