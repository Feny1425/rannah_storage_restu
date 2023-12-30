<?php

namespace App\Filament\Owner\Resources\BranchResource\Pages;

use App\Filament\Owner\Resources\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBranch extends EditRecord
{
    protected static string $resource = BranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
    
}
