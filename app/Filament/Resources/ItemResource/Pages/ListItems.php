<?php

namespace App\Filament\Resources\ItemResource\Pages;

use App\Filament\Resources\BranchItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItems extends ListRecords
{
    protected static string $resource = BranchItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
