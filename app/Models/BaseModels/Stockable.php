<?php

namespace App\Models\BaseModels;

use App\Models\Recordables\Record;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property int $quantity
 */
class Stockable extends BaseModel
{
    use HasFactory;

    protected static function booted(): void
    {
        static::updated(function (Stockable $stockable) {
            /** @var Record $record */
            $record = Record::create([
                'user_id' => auth()->id(),
                'branch_id' => $stockable->branch->id,
                'stockable_quantity' => $stockable->quantity - $stockable->getOriginal('quantity'),
                'stockable_old_quantity' => $stockable->getOriginal('quantity'),
                'stockable_new_quantity' => $stockable->quantity,
            ]);
            $record->branch()->associate($stockable->branch);
            $record->stockable()->associate($stockable);
            $record->save();
        });
    }
}
