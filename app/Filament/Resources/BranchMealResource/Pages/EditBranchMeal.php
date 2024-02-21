<?php

namespace App\Filament\Resources\BranchMealResource\Pages;

use App\Filament\Resources\BranchMealResource;
use App\Models\Recordables\Record;
use App\Models\Stockables\BranchItem;
use App\Models\Stockables\BranchMeal;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EditBranchMeal extends EditRecord
{
    protected static string $resource = BranchMealResource::class;

    protected function authorizeAccess(): void
    {
        $user = Auth::user();
        abort_if(!$user->can('increase BranchMeal'), 403);
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
        $record = BranchMeal::find($data['id']);
        $branch_id = $record->branch_id;
        $meal = $record->meal;

        //  app()->getLocale() to get current language.
        //  static::$title     to get current title and set it.
        static::editName($meal);


        $meal_items = $meal->meal_items;
        $max = 99999999999;
        foreach ($meal_items as $meal_item) {
            $item = $meal_item->item;
            $branch_items = $item->branchItem;
            foreach ($branch_items as $branch_item) {
                if ($branch_item->branch_id == $branch_id) {
                    $c = $branch_item->quantity / $meal_item->quantity;

                    if ($max > $c) {
                        $max = $c;
                    }
                    break;
                }
            }
        }

        $data['max'] = $max;
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
        // for readability
        $branchMeal = $record;

        $SYSTEM_USER = User::where('name', 'SYSTEM')->first();

        //get branch id of meal branch
        $branch_id = $branchMeal->branch_id;
        //get meal of meal branch
        $meal = $branchMeal->meal;
        static::editName($meal);

        $mealRecord = Record::create([
            'user_id' => Auth::id(),
            'branch_id' => $branch_id,
            'stockable_quantity' => $data['quantity'],
            'stockable_old_quantity' => $branchMeal['quantity'],
        ]);
        $mealRecord->stockable()->associate($branchMeal);
        $mealRecord->save();

        //get all meal items that belongs to the meal
        $meal_items = $meal->meal_items;

        //for each meal item
        foreach ($meal_items as $meal_item) {
            //get item of meal item
            $item = $meal_item->item;
            // get all branch items belong to this item

            $branch_item = BranchItem::where('item_id', $item->id)->where('branch_id', $branch_id)->first();

            $usedQuantity = $meal_item->quantity * $data['quantity'];

            $itemRecord = Record::create([
                'user_id' => $SYSTEM_USER->id,
                'branch_id' => $branch_id,
                'stockable_quantity' => $usedQuantity,
                'stockable_old_quantity' => $branch_item->quantity,
            ]);

            //edit item branch quantity
            $quantity = $branch_item->quantity - $usedQuantity;

            // $branch_item->update(['quantity' => $quantity]);
            // This will make it possible to manually create records
            // instead of using the model's create method.
            $branch_item->updateQuietly(['quantity' => $quantity]);

            $itemRecord->stockable_new_quantity = $quantity;
            $itemRecord->stockable()->associate($branch_item);
            $itemRecord->recordable()->associate($mealRecord);
            $itemRecord->save();
        }

        //edit meal branch quantity
        $newQuantity = $data['quantity'] * $meal->batch_size + $branchMeal['quantity'];
        $data['quantity'] = $newQuantity;
        $branchMeal->updateQuietly($data);
        $mealRecord->stockable_new_quantity = $newQuantity;
        $mealRecord->save();

        return $branchMeal;
    }

    public static ?string $t = "sd";

    public function getTitle(): string
    {
        return static::$t;
    }

    public static function editName($model)
    {
        switch (app()->getLocale()) {
            case "en":
                static::$t = "Cook " . $model->name_en;
                break;
            case "ar":
                static::$t = "طبخ " . $model->name;
                break;
        }
    }
}
