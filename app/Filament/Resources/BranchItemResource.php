<?php

namespace App\Filament\Resources;

use App\Enums\Food;
use App\Enums\RoleEnum;
use App\Filament\Resources\BranchItemResource\Pages;
use App\Filament\Resources\BranchItemResource\RelationManagers;
use App\Models\Item;
use App\Models\Stockables\BranchItem;
use Auth;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Component as Livewire;
use Request;

class BranchItemResource extends Resource
{
    protected static ?string $model = BranchItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canViewAny(): bool
    {
        $user = Auth::user();
        return !($user->hasRole(RoleEnum::SUPER_ADMIN) || ($user->hasRole(RoleEnum::OWNER)));
    }
    public static function canView(Model $record): bool
    {
        return true;
    }
    public static function getEloquentQuery(): Builder
    {
        $base = parent::getEloquentQuery();
        $user = Auth::user();
        if ($user->hasRole(RoleEnum::SUPER_ADMIN)) {
            return $base;
        }

        $query = $base->where('branch_id', $user->branch_id);

        $filterValue = Request::input('filters.type');

        if ($filterValue) {
            // When a type filter is selected, only filter 'BranchItem'
            $query->where('type', $filterValue);
        }
        return $query;    
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Some fields here
                self::getShipmentField($form->getOperation()),
                // Other fields there
            ]);
        ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('item.' . __('name_en'))
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('item.' . __('unit_en'))
                    ->label(__('Unit'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label(__('Quantity'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label(__('Type'))
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('type')
                ->options(Food::class)
                ->label(__('Filter by Type')),
            ])
                                  
            ->actions([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\Action::make(__('add'))
                        ->url(fn(BranchItem $record): string => BranchItemResource::getUrl('add', ['record' => $record])),
                    Tables\Actions\Action::make(__('decrease'))
                        ->url(fn(BranchItem $record): string => BranchItemResource::getUrl('decrease', ['record' => $record]))

                ])
            ->bulkActions([
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
            'index' => Pages\ListBranchItems::route('/'),
            'create' => Pages\CreateBranchItem::route('/create'),
            'view' => Pages\ViewBranchItem::route('/{record}'),
            'add' => Pages\EditBranchItem::route('/{record}/add'),
            'decrease' => Pages\DecreaseBranchItem::route('/{record}/decrease'),
        ];
    }
    protected static function getShipmentField(string $operation)
    {
        if ($operation === 'edit') {
            return
                Forms\Components\TextInput::make('quantity')
                    ->autofocus()
                    ->numeric()
                    ->inputMode('decimal')
                    ->minValue(1)
                    ->nullable(false)
                    ->placeholder(__('Added Quantity'))
                    ->label(__('Quantity'));
        } else {
            return Forms\Components\TextInput::make('quantity')
                ->autofocus()
                ->numeric()
                ->inputMode('decimal')
                ->minValue(1)
                ->nullable(false)
                ->placeholder(__('Removed Quantity'))
                ->label(__('Quantity'));
        }
    }
    public static function getLabel(): string
    {
        return __('Item');
    }
    public static function getPluralLabel(): string
    {
        return __('Items');
    }
}
