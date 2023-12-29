<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Food;
use App\Models\Branch;
use App\Models\Item;
use App\Models\Meal;
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

            Item::createMany([
                [
                    'name' => 'رز',
                    'name_en' => 'Rice',
                    'unit' => '1 كجم',
                    'unit_en' => '1 kg',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'سكر',
                    'name_en' => 'Sugar',
                    'unit' => '1 كجم',
                    'unit_en' => '1 kg',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'طحين',
                    'name_en' => 'Flour',
                    'unit' => '1 كجم',
                    'unit_en' => '1 kg',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'شاي',
                    'name_en' => 'Tea',
                    'unit' => '1 كجم',
                    'unit_en' => '1 kg',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'مكرونة',
                    'name_en' => 'Pasta',
                    'unit' => '1 كجم',
                    'unit_en' => '1 kg',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'زيت',
                    'name_en' => 'Oil',
                    'unit' => '1 لتر',
                    'unit_en' => '1 liter',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'معلبات',
                    'name_en' => 'Canned Food',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ملح',
                    'name_en' => 'Salt',
                    'unit' => '1 كجم',
                    'unit_en' => '1 kg',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'معجون طماطم',
                    'name_en' => 'Tomato Paste',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'فاصوليا',
                    'name_en' => 'Beans',
                    'unit' => '1 كجم',
                    'unit_en' => '1 kg',
                    'type' => Food::FOOD,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'قصدير',
                    'name_en' => 'Tin',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::SUPPLIES,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'مناديل',
                    'name_en' => 'Tissue',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::SUPPLIES,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'صابون',
                    'name_en' => 'Soap',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::SUPPLIES,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'معقم',
                    'name_en' => 'Sanitizer',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::SUPPLIES,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'كمامة',
                    'name_en' => 'Mask',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::SUPPLIES,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'قفازات',
                    'name_en' => 'Gloves',
                    'unit' => '1 علبة',
                    'unit_en' => '1 can',
                    'type' => Food::SUPPLIES,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
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
        }
    }
}
