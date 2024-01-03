<?php

namespace App\Filament\Resources\BranchItemResource\Pages;

use App\Filament\Resources\BranchItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBranchItem extends ViewRecord
{
    protected static string $resource = BranchItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
