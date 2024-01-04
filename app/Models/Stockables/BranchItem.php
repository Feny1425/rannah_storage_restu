<?php

namespace App\Models\Stockables;

use App\Enums\Food;
use App\Models\BaseModels\Stockable;
use App\Models\Branch;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Request;

class BranchItem extends Stockable
{
    use HasFactory;
    protected $casts = [
        'typeI' =>  Food::class,
    ];
    
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    
    // Example filtering logic in your controller or where the filtering is applied
    

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
