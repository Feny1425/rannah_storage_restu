<?php

namespace App\Filament\Resources\BranchMealResource\Pages;

use App\Filament\Resources\BranchMealResource;
use App\Models\Meal;
use App\Models\Recordables\MealDecreasedRecord;
use App\Models\Recordables\Record;
use App\Models\Stockables\BranchItem;
use App\Models\Stockables\BranchMeal;
use App\Models\User;
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
        // TODO: refactor to using translation __('') instead of match
        return match (app()->getLocale()) {
            'ar' => 'تقليل ' . $this->getRecord()->meal->name,
            default => 'Decrease ' . $this->getRecord()->meal->name_en,
        };
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(static::getResource()::form(
                $this->makeForm()
                    ->operation('decrease')
                    ->model($this->getRecord())
                    ->statePath($this->getFormStatePath())
                    ->columns($this->hasInlineLabels() ? 1 : 2)
                    ->inlineLabel($this->hasInlineLabels()),
            )),
        ];
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
        // just for readability, the record is a BranchMeal that is being edited
        $branchMeal = $record;

        $record = Record::create([
            'user_id' => Auth::id(),
            'branch_id' => $branchMeal->branch_id,
            'stockable_quantity' => $data['quantity'],
            'stockable_old_quantity' => $branchMeal['quantity'],
        ]);
        $mealDecreasedRecord = MealDecreasedRecord::create([
            'record_id' => $record->id,
            'type' => $data['type'],
        ]);
        $data['quantity'] = $branchMeal['quantity'] - $data['quantity'];

        $record->recordable()->associate($mealDecreasedRecord);
        $record->stockable_new_quantity = $data['quantity'];
        $record->stockable()->associate($branchMeal);
        $record->save();

        // remove 'type' from the data array
        unset($data['type']);

        $branchMeal->updateQuietly($data);

        return $branchMeal;
    }
}
