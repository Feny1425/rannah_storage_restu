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

            User::insert([
                [
                    'name' => 'Super User',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('1'),
                ]
            ]);

            Branch::createMany([
                [
                    'name' => 'Main Branch',
                    'location' => 'https://maps.app.goo.gl/AtHSfor55kjUnfWH7',
                    'manager_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Branch 1',
                    'location' => 'https://maps.app.goo.gl/AtHSfor55kjUnfWH7',
                    'manager_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Branch 2',
                    'location' => 'https://maps.app.goo.gl/AtHSfor55kjUnfWH7',
                    'manager_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Branch 3',
                    'location' => 'https://maps.app.goo.gl/AtHSfor55kjUnfWH7',
                    'manager_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

            $this->call([
                ItemSeeder::class,
            ]);

            Meal::createMany([
                [
                    'name' => 'رز فاصوليا',
                    'name_en' => 'Rice and Beans',
                    'unit' => 'صحن',
                    'unit_en' => 'Plate',
                    'batch_size' => 10,
                    'expiry_duration' => 24,
                ],
                [
                    'name' => 'رز باللحمة',
                    'name_en' => 'Rice with Meat',
                    'unit' => 'صحن',
                    'unit_en' => 'Plate',
                    'batch_size' => 10,
                    'expiry_duration' => 24,
                ],
                [
                    'name' => 'رز بالدجاج',
                    'name_en' => 'Rice with Chicken',
                    'unit' => 'صحن',
                    'unit_en' => 'Plate',
                    'batch_size' => 10,
                    'expiry_duration' => 24,
                ],
                [
                    'name' => 'مكرونة باللحمة',
                    'name_en' => 'Pasta with Meat',
                    'unit' => 'صحن',
                    'unit_en' => 'Plate',
                    'batch_size' => 10,
                    'expiry_duration' => 24,
                ],
                [
                    'name' => 'مكرونة بالدجاج',
                    'name_en' => 'Pasta with Chicken',
                    'unit' => 'صحن',
                    'unit_en' => 'Plate',
                    'batch_size' => 10,
                    'expiry_duration' => 24,
                ],
                [
                    'name' => 'مكرونة بالبشاميل',
                    'name_en' => 'Pasta with Bechamel',
                    'unit' => 'صحن',
                    'unit_en' => 'Plate',
                    'batch_size' => 10,
                    'expiry_duration' => 24,
                ],
            ]);

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
}
