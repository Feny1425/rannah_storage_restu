<?php

namespace App\Filament\Resources\BranchMealResource\Pages;

use App\Filament\Resources\BranchMealResource;
use App\Models\Meal;
use App\Models\Stockables\BranchItem;
use App\Models\Stockables\BranchMeal;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class DecreaseBranchMeal extends EditRecord
{
    protected static string $resource = BranchMealResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $record = BranchMeal::find($data['id']);
        self::editName($record->meal);

        $data['max'] = $data['quantity'];

        $data['quantity'] = '';
        return $data;
    }

    /**
     * @param BranchMeal $record
     * @param array $data
     * @return BranchMeal
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // edit meal branch quantity
        $data['quantity'] = $record['quantity'] - $data['quantity'];
        $record->update($data);
        return $record;
    }

    public static ?string $t = "sd";

    public function getTitle(): string
    {
        return static::$t;
    }

    public static function editName(Meal $model): void
    {
        switch (app()->getLocale()) {
            case "en":
                static::$t = "Decrease " . $model->name_en;
                break;
            case "ar":
                static::$t = "تنقيص " . $model->name;
                break;
        }
    }
}
