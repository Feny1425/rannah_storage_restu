<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $activeNavigationIcon = 'heroicon-s-building-storefront';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->maxLength(255)
                    ->unique(Branch::class, 'name')
                    ->placeholder(__('Branch Name'))
                    ->label(__('Name')),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Branch Location'))
                    ->label(__('Location')),
                Forms\Components\Select::make('manager_id')
                    ->label(__('Branch Manager'))
                    ->relationship('manager', 'name')
                    ->placeholder(__('Select User'))
                    ->required(),
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
                Tables\Columns\TextColumn::make('manager.name')
                    ->getStateUsing(function (Branch $record) {
                        return [
                            'manager.name' => $record->manager->name,
                        ];
                    })
                    ->searchable()
                    ->sortable()
                    ->label(__('User')),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('location')
                    ->label(__('Location'))
                    ->url(function ($record) {
                        // Assuming 'external_link' is the field containing the URL in the Branch model
                        return "$record->location";
                    })
                    ->openUrlInNewTab(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\BranchItemsRelationManager::class,
            RelationManagers\BranchMealsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }


    public static function getLabel(): string
    {
        return __('Branch');
    }

    public static function getpluralLabel(): string
    {
        return __('Branches');
    }
}
