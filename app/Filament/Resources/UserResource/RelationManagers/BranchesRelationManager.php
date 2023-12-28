<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchesRelationManager extends RelationManager
{
    protected static string $relationship = 'branches';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make(__('name'))
                ->autofocus()
                ->required()
                ->maxLength(255)
                ->placeholder(__('Branch Name')),
            Forms\Components\TextInput::make(__('location'))
                ->required()
                ->maxLength(255)
                ->placeholder(__('Branch Location')),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label(__('Branch Name'))
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),  
                Tables\Actions\Action::make('location')
                ->label(__('Location'))
                ->url(function ($record) {
                    // Assuming 'external_link' is the field containing the URL in the Branch model
                    return "$record->location";
                })
                ->openUrlInNewTab(),
            ]);
    }
}
