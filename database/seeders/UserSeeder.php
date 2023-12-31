<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // roles
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

        // permissions
        Artisan::call('permissions:sync -COPY');

        // users
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

        // assign permissions to roles
        // $superAdminRole->givePermissionTo(Permission::where('guard_name', 'web')->get()); // no need for this since we will use has super admin trait on User model

        // assign roles to users
        $superAdminUser->assignRole($superAdminRole);
        $systemUser->assignRole($systemRole);
    }
}
