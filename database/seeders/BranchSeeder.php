<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
