<?php

namespace App\Models\Stockables;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property int $quantity
 */
class Stockable extends BaseModel
{
    use HasFactory;
}
