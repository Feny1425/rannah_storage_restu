<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create([
            'name' => RoleEnum::SUPER_ADMIN,
            'guard_name' => 'web',
        ]);
        $systemRole = Role::create([
            'name' => RoleEnum::SYSTEM,
            'guard_name' => 'web',
        ]);
        $ownerRole = Role::create([
            'name' => RoleEnum::OWNER,
            'guard_name' => 'web',
        ]);
        $receiverRole = Role::create([
            'name' => RoleEnum::RECEIVER,
            'guard_name' => 'web',
        ]);
        $dispatcherRole = Role::create([
            'name' => RoleEnum::DISPATCHER,
            'guard_name' => 'web',
        ]);
        $cashierRole = Role::create([
            'name' => RoleEnum::CASHIER,
            'guard_name' => 'web',
        ]);

        $superAdminUser = User::create([
            'name' => 'Super User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1'),
        ]);
        $systemUser = User::create([
            'name' => 'SYSTEM',
            'email' => 'SYSTEM@eny.sa',
            'password' => bcrypt((string)Str::uuid()),
        ]);

        $superAdminUser->assignRole($superAdminRole);
        $systemUser->assignRole($systemRole);
    }
}
