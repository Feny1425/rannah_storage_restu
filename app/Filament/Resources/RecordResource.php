<?php

namespace App\Filament\Resources;

use App\Enums\CloseTypeEnum;
use App\Filament\Resources\RecordResource\Pages;
use App\Filament\Resources\RecordResource\RelationManagers;
use App\Models\Recordables\MealDecreasedRecord;
use App\Models\Recordables\Record;
use App\Models\Stockables\BranchItem;
use App\Models\Stockables\BranchMeal;
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
                Tables\Columns\TextColumn::make('id')
                    ->label(__('ID'))
                    ->sortable(),
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
                    ->sortable(),
                Tables\Columns\TextColumn::make('stockable_old_quantity')
                    ->label(__('Old Quantity'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('stockable_new_quantity')
                    ->label(__('New Quantity'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('details')
                    ->label(__('Details'))
                    ->state(function (Record $record) {
                        switch ($record->recordable_type) {
                            case MealDecreasedRecord::class:
                                return CloseTypeEnum::fromValue($record->recordable->type)->getLabel();

                            case Record::class:
                                return $record->recordable->id;
                        }
                    })
            ])
            ->defaultSort('created_at', 'desc')
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
