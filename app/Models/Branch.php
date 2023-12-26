<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branchItems(): BelongsTo
    {
        return $this->belongsTo(BranchItem::class);
    }

    protected static function booted()
    {
        static::created(function ($branch) {
            // create a branch item record without duplicating
            foreach (Item::all() as $item) {
                BranchItem::firstOrCreate([
                    'branch_id' => $branch->id,
                    'item_id' => $item->id,
                    'quantity' => 0
                ]);
            }
        });
    }
}
