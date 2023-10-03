<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\FAQ;
use App\Models\User;

class FAQPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FAQ $faq): bool
    {
        return $user->can('Access FAQ');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('Write FAQ');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FAQ $faq): bool
    {
        return $user->can('Edit FAQ');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FAQ $faq): bool
    {
        return $user->can('Delete FAQ');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FAQ $faq): bool
    {
        return $user->can('restore FAQ');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FAQ $faq): bool
    {
        return $user->can('force-delete FAQ');
    }
}
