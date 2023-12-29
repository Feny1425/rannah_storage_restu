<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchMeal extends BaseModel
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