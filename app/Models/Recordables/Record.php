<?php

namespace App\Models\Recordables;

use App\Models\BaseModels\BaseModel;
use App\Models\BaseModels\Recordable;
use App\Models\BaseModels\Stockable;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read Recordable $recordable
 * @property-read Stockable $stockable
 */
class Record extends BaseModel
{
    use HasFactory;

    public $timestamps = false;

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function recordable(): MorphTo
    {
        return $this->morphTo();
    }

    public function stockable(): MorphTo
    {
        return $this->morphTo();
    }
}
