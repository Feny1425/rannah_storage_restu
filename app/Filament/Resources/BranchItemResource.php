<?php

namespace App\Filament\Resources;

use App\Enums\RoleEnum;
use App\Filament\Resources\BranchItemResource\Pages;
use App\Filament\Resources\BranchItemResource\RelationManagers;
use App\Models\Stockables\BranchItem;
use Auth;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Component as Livewire;
class BranchItemResource extends Resource
{
    protected static ?string $model = BranchItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canViewAny(): bool{
        $user = Auth::user();
        return !($user->hasRole(RoleEnum::SUPER_ADMIN)||($user->hasRole(RoleEnum::OWNER)));
    }
    public static function canEdit(Model $record): bool
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

        return $base->where('branch_id', $user->branch_id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('o_quantity')
                    ->autofocus()
                    ->numeric()
                    ->inputMode('decimal')
                    ->after(function (Livewire $livewire, Get $get, Set $set) {
                        $set('quantity', $get('quantity')+$get('o_quantity'));
                        $set('o_quantity', 0);
                    })
                    ->placeholder(__('Quantity'))
                    ->label(__('Quantity')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('item.'.__('name_en'))
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('item.'.__('unit_en'))
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBranchItems::route('/'),
            'create' => Pages\CreateBranchItem::route('/create'),
            'view' => Pages\ViewBranchItem::route('/{record}'),
            'edit' => Pages\EditBranchItem::route('/{record}/edit'),
        ];
    }
}
