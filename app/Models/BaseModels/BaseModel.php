<?php

namespace App\Models\BaseModels;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function createMany(array $data): void
    {
        foreach ($data as $item) {
            static::create($item);
        }
    }
}