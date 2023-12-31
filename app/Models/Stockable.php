<?php

namespace App\Models;

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
            ]);
            $record->branch()->associate($stockable->branch);

            /** @var QuantityEditRecord $quantityEditRecord */
            $quantityEditRecord = QuantityEditRecord::create([
                'record_id' => $record->id,
                'old_quantity' => $stockable->getOriginal('quantity'),
                'new_quantity' => $stockable->quantity,
            ]);

            $record->recordable()->associate($quantityEditRecord);
            $record->stockable()->associate($stockable);
            $record->save();
        });
    }
}
