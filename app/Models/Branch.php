<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    protected static function booted(): void
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

    public function getLocation(): string
    {
        return $this->location;
    }

}
