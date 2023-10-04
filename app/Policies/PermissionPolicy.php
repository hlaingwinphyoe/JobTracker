<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyPermission(['Access Permission', 'Write Permission', 'Edit Permission', 'Delete Permission']);
    }
   /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasDirectPermission('Access Permission');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasDirectPermission('Write Permission');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->hasDirectPermission('Edit Permission');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasDirectPermission('Delete Permission');
    }
}
