<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Recordable extends BaseModel
{
    use HasFactory;

    public $timestamps = false;

    public function record(): MorphOne
    {
        return $this->morphOne(Record::class, 'recordable');
    }
}
