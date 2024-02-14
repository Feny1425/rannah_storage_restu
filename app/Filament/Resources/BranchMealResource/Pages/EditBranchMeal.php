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
        $data['quantity'] = 0;
    
        return $data;
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        
        $branch_id = $record->branch_id;
        $meal = $record->meal;
        $meal_items = $meal->meal_items;
        foreach ($meal_items as $meal_item){
            $item = $meal_item->item;
            $branch_items = $item->branchItem;
            foreach($branch_items as $branch_item){
                if($branch_item->branch_id == $branch_id){
                    $quantity = $branch_item->quantity - ($meal_item->quantity * $data['quantity']);
                    $branch_item->update(['quantity' => $quantity]);
                    break;
                }
            }
        }
        $data['quantity'] = $data['quantity'] + $record['quantity'];
        $record->update($data);
        return $record;
    }
}
