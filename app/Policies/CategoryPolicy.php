<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        // return $user->hasAnyPermission(['Access Category', 'Write Category', 'Edit Category', 'Delete Category']);
        return $user->hasDirectPermission('Access Category');
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Category $category): bool
    {
        return $user->hasDirectPermission('View Category');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasDirectPermission('Write Category');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): bool
    {
        return $user->hasDirectPermission('Edit Category');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->hasDirectPermission('Delete Category');
    }
}
