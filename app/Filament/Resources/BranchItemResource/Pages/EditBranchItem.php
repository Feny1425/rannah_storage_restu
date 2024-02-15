<?php

namespace App\Filament\Resources\BranchItemResource\Pages;

use App\Filament\Resources\BranchItemResource;
use App\Models\Stockables\BranchItem;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditBranchItem extends EditRecord
{
    protected static string $resource = BranchItemResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
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
                static::$t = "Add " . $item->name_en;
                break;
            case "ar":
                static::$t = "إضافة " . $item->name;
                break;
        }
        $data['quantity'] = '';
     
        return $data;
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['quantity'] = $data['quantity'] + $record['quantity'];
        $record->update($data);
        
        return $record;
    }

    public static ?string $t = "sd";
    public function getTitle(): string
    {
        return static::$t;
    }
}
