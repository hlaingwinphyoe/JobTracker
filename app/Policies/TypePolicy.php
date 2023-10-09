<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Type;
use App\Models\User;

class TypePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasDirectPermission('Access Type');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Type $type): bool
    {
        return $user->hasDirectPermission('View Type');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasDirectPermission('Write Type');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Type $type): bool
    {
        return $user->hasDirectPermission('Edit Type');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Type $type): bool
    {
        return $user->hasDirectPermission('Delete Type');
    }
}
