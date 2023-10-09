<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Employer;
use App\Models\User;

class EmployerPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasDirectPermission('Access Employer');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employer $employer): bool
    {
        return $user->hasDirectPermission('View Employer');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasDirectPermission('Write Employer');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employer $employer): bool
    {
        return $user->hasDirectPermission('Edit Employer');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employer $employer): bool
    {
        return $user->hasDirectPermission('Delete Employer');
    }
}
