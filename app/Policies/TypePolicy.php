<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Type;
use App\Models\User;

class TypePolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Type $type): bool
    {
        return $user->can('Access Type');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Write Type');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Type $type): bool
    {
        return $user->can('Edit Type');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Type $type): bool
    {
        return $user->can('Delete Type');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Type $type): bool
    {
        return $user->can('restore Type');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Type $type): bool
    {
        return $user->can('force-delete Type');
    }
}
