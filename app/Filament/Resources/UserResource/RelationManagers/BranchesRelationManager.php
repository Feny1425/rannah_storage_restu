<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
<<<<<<< HEAD
use App\Models\Branch;
=======
>>>>>>> bc74953e3db6959d3897888b372d3e20f4a72239
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchesRelationManager extends RelationManager
{
    protected static string $relationship = 'branches';

    public function form(Form $form): Form
    {
        return $form
<<<<<<< HEAD
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
=======
            ->schema([
                Forms\Components\TextInput::make('user')
                    ->required()
                    ->maxLength(255),
            ]);
>>>>>>> bc74953e3db6959d3897888b372d3e20f4a72239
    }

    public function table(Table $table): Table
    {
        return $table
<<<<<<< HEAD
            ->recordTitleAttribute('user')
=======
            ->recordTitleAttribute('id')
>>>>>>> bc74953e3db6959d3897888b372d3e20f4a72239
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
<<<<<<< HEAD
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
=======
                    ->label(__('Name')),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->sortable()
                    ->label(__('Location')),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->label(__('User')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
>>>>>>> bc74953e3db6959d3897888b372d3e20f4a72239
            ]);
    }
}
