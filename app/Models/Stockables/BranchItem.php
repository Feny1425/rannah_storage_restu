<?php

namespace App\Models\Stockables;

use App\Models\BaseModels\Stockable;
use App\Models\Branch;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Request;

class BranchItem extends Stockable
{
    use HasFactory;
    protected $appends = ['type'];
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    public function getTypeAttribute()
    {
        // Assuming 'item' is the relationship method for the 'Item' model
        return $this->item->type ?? null;
    }
    // Example filtering logic in your controller or where the filtering is applied
    

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
