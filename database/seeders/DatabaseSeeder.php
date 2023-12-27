<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        if (User::count() === 0) {
            User::factory()->create([
                'name' => 'Super User',
                'email' => 'admin@admin.com',
                'password' => '1'
            ]);
        }
    }
}