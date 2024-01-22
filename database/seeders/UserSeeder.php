<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

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

        // permissions - https://github.com/Althinect/filament-spatie-roles-permissions
        Artisan::call('permissions:sync -COPY');
        Permission::insert([
            [
                'name' => 'view reports',
                'guard_name' => 'web',
            ]
        ]);

        // users
        $admin = User::create([
            'name' => 'Super User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1'),
        ]);
        $systemUser = User::create([
            'name' => 'SYSTEM',
            'email' => 'SYSTEM@eny.sa',
            'password' => bcrypt((string)Str::uuid()),
        ]);
        $receiverUser = User::create([
            'name' => 'Receiver',
            'email' => 'receiver@eny.sa',
            'password' => bcrypt('1'),
        ]);


        // assign permissions to roles
        // $superAdminRole->givePermissionTo(Permission::where('guard_name', 'web')->get()); // no need for this since we will use has super admin trait on User model
        $ownerRole
            // ->givePermissionTo('view-any Report')
            ->givePermissionTo('view-any Record')
            ->givePermissionTo('view-any BranchItem')
            ->givePermissionTo('view-any BranchMeal')
            ->givePermissionTo('update User');

        $receiverRole
            ->givePermissionTo('update BranchItem');

        $dispatcherRole
            ->givePermissionTo('update BranchItem');

        // assign roles to users
        $admin->assignRole($superAdminRole);
        $systemUser->assignRole($systemRole);
        $receiverUser->assignRole($receiverRole);
    }
}
