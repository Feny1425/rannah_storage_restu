<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super User',
                'email' => 'admin@admin.com',
                'password' => bcrypt('1'),
            ],
            [
                'name' => 'SYSTEM',
                'email' => 'SYSTEM@eny.sa',
                'password' => bcrypt((string)Str::uuid()),
            ]
        ]);
    }
}
