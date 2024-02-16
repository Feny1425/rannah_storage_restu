<?php

namespace App\Filament\Resources\BranchMealResource\Pages;

use App\Filament\Resources\BranchMealResource;
use App\Models\Meal;
use App\Models\Stockables\BranchItem;
use App\Models\Stockables\BranchMeal;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DecreaseBranchMeal extends EditRecord
{
    protected static string $resource = BranchMealResource::class;

    protected function authorizeAccess(): void
    {
        $user = Auth::user();
        abort_if(!$user->can('decrease BranchMeal'), 403);
    }

    public function getTitle(): string
    {
        return match (app()->getLocale()) {
            'ar' => 'تقليل ' . $this->getRecord()->meal->name,
            default => 'Decrease ' . $this->getRecord()->meal->name_en,
        };
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
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
}
