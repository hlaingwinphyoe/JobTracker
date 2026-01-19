<?php

namespace App\Filament\Resources;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource as BasePermissionResource;

class PermissionResource extends BasePermissionResource
{
    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();

        if (!$user) {
            return false;
        }

        return $user->hasAnyRole(['Admin', 'Developer']);
    }
}
