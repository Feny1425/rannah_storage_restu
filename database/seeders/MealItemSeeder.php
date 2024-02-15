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
        self::addMealItem(1, 1, 1);
        self::addMealItem(1, 4, 5);
        self::addMealItem(1, 6, 6);

        self::addMealItem(2, 3, 7);
        self::addMealItem(2, 4, 8);

        self::addMealItem(3, 6, 4);
        self::addMealItem(3, 3, 5);

        self::addMealItem(4, 5, 6);

        self::addMealItem(5, 10, 7);
        self::addMealItem(5, 11, 8);
        
        self::addMealItem(6, 15, 9);
        self::addMealItem(6, 24, 4);
        self::addMealItem(6, 1, 2);
    }

    public function addMealItem(int $meal_id, int $item_id, int $quantity)
    {
        MealItem::create(
            [
                'meal_id' => $meal_id,
                'item_id' => $item_id,
                'quantity' => $quantity,
            ]
        );
    }
}
