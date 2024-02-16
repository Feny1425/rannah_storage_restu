<?php

namespace App\Filament\Resources;

use App;
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

    protected static ?string $activeNavigationIcon = 'heroicon-s-cake';
    protected static ?string $navigationIcon = 'heroicon-o-cake';

    public static function canViewAny(): bool
    {
        $user = Auth::user();
        if ($user->hasRole(RoleEnum::SUPER_ADMIN)) return false;
        if ($user->hasRole(RoleEnum::OWNER)) return false;
        if ($user->hasPermissionTo('increase BranchMeal')) return true;
        if ($user->hasPermissionTo('decrease BranchMeal')) return true;
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        $base = parent::getEloquentQuery();
        $user = Auth::user();
        if ($user->hasRole(RoleEnum::SUPER_ADMIN)) {
            return $base;
        }

        $query = $base->where('branch_id', $user->branch_id);

        if ($user->hasRole(RoleEnum::CASHIER)) {
            $query = $query->whereNot('quantity', 0);
        }
        return $query;
    }

    public static function form(Form $form): Form
    {
        $quantityField = Forms\Components\TextInput::make('quantity')
            ->autofocus()
            ->numeric()
            ->inputMode('decimal')
            ->nullable(false)
            ->maxValue(function (Get $get): int {
                $max = $get('max');
                return (int)$max;
            })
            ->minValue(1)
            ->placeholder(__('Added Quantity'))
            ->label(__('Quantity'));

        $formSchema = [
            $quantityField
        ];

        if ($form->getOperation() === 'add') {
            $quantityField
                ->placeholder(__('Added Quantity'));
        } //
        else if ($form->getOperation() === 'decrease') {
            $quantityField
                ->placeholder(__('Decreased Quantity'));

            $formSchema[] = Forms\Components\Select::make('type')
                ->options([
                    'sold' => __('Sold'),
                    'spoiled' => __('Spoiled'),
                    'staff_meals' => __('Staff Meals'), // or 'workers_meals' for إعاشة عمال
                    'meal_provision' => __('Meal Provision'), // for إعاشة
                    'donation' => __('Donation'),
                ])
                ->label(__('Type'))
                ->nullable(false);
        }

        return $form->schema($formSchema);
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
                Tables\Actions\Action::make(__('add'))
                    ->url(fn(BranchMeal $record): string => BranchMealResource::getUrl('increase', ['record' => $record]))
                    ->visible(function () {
                        $user = Auth::user();
                        return $user->hasPermissionTo('increase BranchMeal');
                    }),
                Tables\Actions\Action::make(__('dispatch'))
                    ->url(fn(BranchMeal $record): string => BranchMealResource::getUrl('decrease', ['record' => $record]))
                    ->visible(function () {
                        $user = Auth::user();
                        return $user->hasPermissionTo('decrease BranchMeal');
                    })
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
            'increase' => Pages\EditBranchMeal::route('/{record}/add'),
            'decrease' => Pages\DecreaseBranchMeal::route('/{record}/decrease'),
        ];
    }

    public static function getPluralLabel(): string
    {
        $user = Auth::user();
        if ($user->hasRole(RoleEnum::DISPATCHER)) {
            return __('Meals');
        } else {
            return __('Close');
        }
    }
}
