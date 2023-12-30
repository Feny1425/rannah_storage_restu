<?php

namespace App\Models\Recordables;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Recordable extends BaseModel
{
    use HasFactory;

    public function record(): MorphOne
    {
        return $this->morphOne(Record::class, 'recordable');
    }
}
