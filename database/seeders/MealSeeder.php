<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
