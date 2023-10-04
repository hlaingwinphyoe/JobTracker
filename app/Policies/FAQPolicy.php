<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\FAQ;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class FAQPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyPermission(['Access FAQ', 'Write FAQ', 'Edit FAQ', 'Delete FAQ']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasDirectPermission('Access FAQ');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasDirectPermission('Write FAQ');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->hasDirectPermission('Edit FAQ');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->hasDirectPermission('Delete FAQ');
    }
}
