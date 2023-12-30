<?php

namespace App\Models;

use App\Enums\Food;
use App\Models\Stockables\BranchItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends BaseModel
{
    use HasFactory;
    protected $casts = [
        'type' =>  Food::class,
    ];
    protected static function booted(): void
    {
        static::created(function ($item) {
            // create a branch item record without duplicating
            foreach (Branch::all() as $branch) {
                BranchItem::firstOrCreate([
                    'branch_id' => $branch->id,
                    'item_id' => $item->id,
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
