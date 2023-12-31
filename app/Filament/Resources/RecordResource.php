<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecordResource\Pages;
use App\Filament\Resources\RecordResource\RelationManagers;
use App\Models\BranchItem;
use App\Models\BranchMeal;
use App\Models\Record;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RecordResource extends Resource
{
    protected static ?string $model = Record::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 4;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('User Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('branch.name')
                    ->label(__('Branch Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stockable.name')
                    ->getStateUsing(function (Record $record) {
                        if ($record->stockable_type === BranchItem::class) {
                            return $record->stockable->item->name;
                        } else if ($record->stockable_type === BranchMeal::class) {
                            return $record->stockable->meal->name;
                        }
                        return null;
                    })
                    ->label(__('Item/Meal Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stockable_quantity')
                    ->label(__('Quantity'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListRecords::route('/'),
            // 'create' => Pages\CreateRecord::route('/create'),
            // 'edit' => Pages\EditRecord::route('/{record}/edit'),
        ];
    }
}
