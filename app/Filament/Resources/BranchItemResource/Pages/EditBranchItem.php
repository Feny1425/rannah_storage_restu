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
        static::editName($item);
        $data['quantity'] = '';
     
        return $data;
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['quantity'] = $data['quantity'] + $record['quantity'];
        $record->update($data);
        $item = $record->item;
        static::editName($item);
        
        return $record;
    }

    public static ?string $t = "sd";
    public function getTitle(): string
    {
        return static::$t;
    }
    public static function editName($model){
        switch(app()->getLocale()){
            case "en":
                static::$t = "Add " . $model->name_en;
                break;
            case "ar":
                static::$t = "إضافة " . $model->name;
                break;
        }
    }
}
