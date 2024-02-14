<?php

namespace App\Filament\Resources\BranchMealResource\Pages;

use App\Filament\Resources\BranchMealResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBranchMeals extends ListRecords
{
    protected static string $resource = BranchMealResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
