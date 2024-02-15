<?php

namespace App\Filament\Resources\BranchMealResource\Pages;

use App\Filament\Resources\BranchMealResource;
use App\Models\Stockables\BranchItem;
use App\Models\Stockables\BranchMeal;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditBranchMeal extends EditRecord
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
        $branch_id = $record->branch_id;
        $meal = $record->meal;

        //  app()->getLocale() to get current language.
        //  static::$title     to get current title and set it.
        static::editName($meal);



        $meal_items = $meal->meal_items;
        $max = 99999999999;
        foreach ($meal_items as $meal_item){
            $item = $meal_item->item;
            $branch_items = $item->branchItem;
            foreach($branch_items as $branch_item){
                if($branch_item->branch_id == $branch_id){
                    $c = $branch_item->quantity/$meal_item->quantity;
                    
                    if($max > $c){
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
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        //get branch id of meal branch
        $branch_id = $record->branch_id;
        //get meal of meal branch
        $meal = $record->meal;
        static::editName($meal);



        //get all emal items that belongs to the meal
        $meal_items = $meal->meal_items;

        //for each meal item
        foreach ($meal_items as $meal_item){
            //get item of meal item
            $item = $meal_item->item;
            // get all branch items belong to this item
            $branch_items = $item->branchItem;

            //for each branch item
            foreach($branch_items as $branch_item){

                //check if this branch item belongs to the meal-branch branch 
                if($branch_item->branch_id == $branch_id){

                    //edit item branch quantity
                    $quantity = $branch_item->quantity - ($meal_item->quantity * $data['quantity']);
                    $branch_item->update(['quantity' => $quantity]);
                    break;
                }
            }
        }

        //edit meal branch quantity
        $data['quantity'] = $data['quantity'] + $record['quantity'];
        $record->update($data);
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
                static::$t = "Cook " . $model->name_en;
                break;
            case "ar":
                static::$t = "طبخ " . $model->name;
                break;
        }
    }
}
