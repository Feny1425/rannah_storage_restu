<?php

namespace App\Models\Stockables;

use App\Models\Branch;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchMeal extends Stockable
{
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }
}