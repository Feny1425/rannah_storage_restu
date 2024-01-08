<?php

namespace App\Models;

use App\Enums\Food;
use App\Models\BaseModels\BaseModel;
use App\Models\Stockables\BranchItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends BaseModel
{
    use HasFactory;

    // protected $casts = [
    //     'type' => Food::class,
    // ];
    public function branchItem(): HasMany
    {
        return $this->hasMany(BranchItem::class);
    }

    protected static function booted(): void
    {
        static::created(function ($item) {
            // create a branch item record without duplicating
            foreach (Branch::all() as $branch) {
                BranchItem::firstOrCreate([
                    'branch_id' => $branch->id,
                    'item_id' => $item->id,
                    'quantity' => 0,
                    // 'typeI' => $item->type,
                ]);
            }
        });
    }
}
