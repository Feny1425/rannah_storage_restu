<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Food;
use App\Models\Branch;
use App\Models\Item;
use App\Models\Meal;
use App\Models\MealItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // database is empty, create some data
        if (User::count() === 0) {
            $this->call([
                UserSeeder::class,
                BranchSeeder::class,
                ItemSeeder::class,
                MealSeeder::class,
                MealItemSeeder::class,
            ]);
        }
    }
}
