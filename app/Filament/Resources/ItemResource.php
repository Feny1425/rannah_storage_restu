<?php

namespace App\Filament\Resources;

use App\Enums\Food;
use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $activeNavigationIcon = 'heroicon-s-squares-plus';
    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('اسم العنصر')
                    ->label('الاسم'),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Item Name')
                    ->label('Name'),
                Forms\Components\TextInput::make('unit')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('وحدة العنصر')
                    ->label('الوحدة'),
                Forms\Components\TextInput::make('unit_en')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Item Unit')
                    ->label('Unit'),
                Forms\Components\Select::make('type')
                    ->required()
                    ->options(Food::class)
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
                Tables\Columns\TextColumn::make(__('name_en'))
                    ->searchable()
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make(__('unit_en'))
                    ->searchable()
                    ->label(__('Unit')),
                Tables\Columns\TextColumn::make('type')
                    ->searchable()
                    ->label(__('Type'))
                    ->badge('')
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label(__('Type'))
                    ->options(Food::class)
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
