<?php

namespace Database\Seeders;

use App\Models\MealItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MealItem::createMany([
            [
                'meal_id' => 1,
                'item_id' => 1,
                'quantity' => 1,
            ],
            [
                'meal_id' => 1,
                'item_id' => 9,
                'quantity' => 1,
            ],
            [
                'meal_id' => 2,
                'item_id' => 1,
                'quantity' => 1,
            ],
            [
                'meal_id' => 2,
                'item_id' => 9,
                'quantity' => 1,
            ],
            [
                'meal_id' => 2,
                'item_id' => 10,
                'quantity' => 1,
            ],
            [
                'meal_id' => 3,
                'item_id' => 1,
                'quantity' => 1,
            ],
            [
                'meal_id' => 3,
                'item_id' => 9,
                'quantity' => 1,
            ],
            [
                'meal_id' => 3,
                'item_id' => 11,
                'quantity' => 1,
            ],
            [
                'meal_id' => 4,
                'item_id' => 5,
                'quantity' => 1,
            ],
            [
                'meal_id' => 4,
                'item_id' => 9,
                'quantity' => 1,
            ],
            [
                'meal_id' => 4,
                'item_id' => 10,
                'quantity' => 1,
            ],
            [
                'meal_id' => 5,
                'item_id' => 5,
                'quantity' => 1,
            ],
            [
                'meal_id' => 5,
                'item_id' => 9,
                'quantity' => 1,
            ],
            [
                'meal_id' => 5,
                'item_id' => 11,
                'quantity' => 1,
            ],
            [
                'meal_id' => 6,
                'item_id' => 5,
                'quantity' => 1,
            ],
            [
                'meal_id' => 6,
                'item_id' => 9,
                'quantity' => 1,
            ],
            [
                'meal_id' => 6,
                'item_id' => 12,
                'quantity' => 1,
            ],
        ]);
    }
}
