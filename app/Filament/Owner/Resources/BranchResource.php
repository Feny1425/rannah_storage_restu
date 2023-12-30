<?php

namespace App\Filament\Owner\Resources;

use App\Filament\Owner\Resources\BranchResource\Pages;
use App\Filament\Owner\Resources\BranchResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(__('Name'))
                    ,
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
            ])
            ->query(function (Branch $query) {
                return $query->where('manager_id', auth()->user()->id);
                });;
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
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
       return false;
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
