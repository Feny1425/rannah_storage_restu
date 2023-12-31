<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use App\Models\Stockables\BranchItem;
use App\Models\Stockables\BranchMeal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends BaseModel
{
    use HasFactory;

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function branch_items(): HasMany
    {
        return $this->hasMany(BranchItem::class);
    }

    public function branch_meals(): HasMany
    {
        return $this->hasMany(BranchMeal::class);
    }

    protected static function booted(): void
    {
        static::created(function ($branch) {

            foreach (Item::all() as $item) {
                BranchItem::firstOrCreate([
                    'branch_id' => $branch->id,
                    'item_id' => $item->id,
                    'quantity' => 0
                ]);
            }

            foreach (Meal::all() as $meal) {
                BranchMeal::firstOrCreate([
                    'branch_id' => $branch->id,
                    'item_id' => $meal->id,
                    'quantity' => 0
                ]);
            }
        });
    }

    public function getLocation(): string
    {
        return $this->location;
    }

}
