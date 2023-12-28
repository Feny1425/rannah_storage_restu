<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('اسم العنصر')
                    ->label('الاسم'),
                    Forms\Components\TextInput::make('nameEN')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Item Name')
                        ->label('Name'),
                Forms\Components\TextInput::make('unit')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('وحدة العنصر')
                    ->label('الوحدة'),
                    Forms\Components\TextInput::make('unitEN')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Item Unit')
                        ->label('Unit'),
                Forms\Components\Select::make('type')
                    ->required()
                    ->options([
                        'food' => __('Food'),
                        'supplies' => __('Supplies'),
                    ])
                    ->placeholder(__('Item Type'))
                    ->label(__('Type')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(__('nameEN'))
                    ->searchable()
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make(__('unitEN'))
                    ->searchable()
                    ->label(__('Unit')),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->label(__('Type')),

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
    
    public static function getLabel(): string
    {
        return __('Item');
    }
    public static function getpluralLabel(): string
    {
        return __('Items');
    }
}
