<?php

namespace App\Filament\Resources;

use App\Enums\RoleEnum;
use App\Filament\Resources\BranchMealResource\Pages;
use App\Filament\Resources\BranchMealResource\RelationManagers;
use App\Models\Stockables\BranchMeal;
use Auth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchMealResource extends Resource
{
    protected static ?string $model = BranchMeal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canViewAny(): bool
    {
        $user = Auth::user();
        return !($user->hasRole(RoleEnum::SUPER_ADMIN) || ($user->hasRole(RoleEnum::OWNER)));
    }
    
    public static function getEloquentQuery(): Builder
    {
        $base = parent::getEloquentQuery();
        $user = Auth::user();
        if ($user->hasRole(RoleEnum::SUPER_ADMIN)) {
            return $base;
        }

        $query = $base->where('branch_id', $user->branch_id);

        return $query;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('quantity')
                ->autofocus()
                ->numeric()
                ->inputMode('decimal')
                ->maxValue(function (Get $get): int {
                    $max = $get('max');
                    return (int)$max;
                })
                ->minValue(1)
                ->nullable(false)
                ->placeholder(__('Added Quantity'))
                ->label(__('Quantity'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('meal.' . __('name_en'))
                ->label(__('Name'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('meal.' . __('unit_en'))
                ->label(__('Unit'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('quantity')
                ->label(__('Quantity'))
                ->searchable()
                ->sortable()
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
            'index' => Pages\ListBranchMeals::route('/'),
            'create' => Pages\CreateBranchMeal::route('/create'),
            'edit' => Pages\EditBranchMeal::route('/{record}/edit'),
        ];
    }
}
