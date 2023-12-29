<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meal extends BaseModel
{
    use HasFactory;

    public function meal_items(): HasMany
    {
        return $this->hasMany(MealItem::class);
    }

    protected static function booted(): void
    {
        static::created(function ($meal) {
            // create a branch item record without duplicating
            foreach (Branch::all() as $branch) {
                BranchMeal::firstOrCreate([
                    'branch_id' => $branch->id,
                    'meal_id' => $meal->id,
                    'quantity' => 0
                ]);
            }
        });
    }
    public function getNameUnitAttribute()
    {
        return $this->attributes['name'] . ' ' . $this->attributes['unit'];
    }

    public function getNameUnitEnAttribute()
    {
        return $this->attributes['name_en'] . ' ' . $this->attributes['unit_en'];
    }
}
