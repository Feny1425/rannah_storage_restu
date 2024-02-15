<?php

namespace App\Filament\Resources\BranchItemResource\Pages;

use App\Filament\Resources\BranchItemResource;
use App\Models\Stockables\BranchItem;
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
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $record = BranchItem::find($data['id']);
        $item = $record->item;
        
        //  app()->getLocale() to get current language.
        //  static::$title     to get current title and set it.
        switch(app()->getLocale()){
            case "en":
                static::$title = "View " . $item->name_en;
                break;
            case "ar":
                static::$title = "عرض " . $item->name;
                break;
        }
        return $data;
    }
}
