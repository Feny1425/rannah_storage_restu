<?php

namespace App\Models;

use App\Enums\Food;
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
}
