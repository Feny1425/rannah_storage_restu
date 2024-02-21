<?php

namespace App\Models\Recordables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class MealDecreasedRecord extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function record(): MorphOne
    {
        return $this->morphOne(Record::class, 'recordable');
    }
}
