<?php

namespace App\Filament\Plugins;

use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\RoleResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentSpatiePlugin extends FilamentSpatieRolesPermissionsPlugin implements Plugin
{
    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                RoleResource::class,
                PermissionResource::class,
            ]);
    }
}