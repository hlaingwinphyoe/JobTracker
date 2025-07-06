<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use Althinect\FilamentSpatieRolesPermissions\Resources\CustomPermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    protected static string $resource = CustomPermissionResource::class;
}
