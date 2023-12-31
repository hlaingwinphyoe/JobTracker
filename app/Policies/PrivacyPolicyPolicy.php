<?php

namespace App\Policies;

use App\Models\User;

class PrivacyPolicyPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasDirectPermission('Access Privacy Policy');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasDirectPermission('View Privacy Policy');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasDirectPermission('Write Privacy Policy');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->hasDirectPermission('Edit Privacy Policy');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasDirectPermission('Delete Privacy Policy');
    }
}
