<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Employee;
use App\Models\User;

class EmployeePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasDirectPermission('Access Employee');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employee $employee): bool
    {
        return $user->hasDirectPermission('View Employee');
    }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     return $user->hasDirectPermission('Write Employee');
    // }

    /**
     * Determine whether the user can update the model.
     */
    // public function update(User $user, Employee $employee): bool
    // {
    //     return $user->hasDirectPermission('Edit Employee');
    // }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employee $employee): bool
    {
        return $user->hasDirectPermission('Delete Employee');
    }
}
