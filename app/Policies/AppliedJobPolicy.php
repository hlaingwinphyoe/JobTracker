<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AppliedJob;
use App\Models\User;

class AppliedJobPolicy
{
    public function viewAny(User $user): bool
    {
        // return $user->hasAnyPermission(['Access AppliedJob', 'Write AppliedJob', 'Edit AppliedJob', 'Delete AppliedJob']);
        return $user->hasDirectPermission('Access Applied Job');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AppliedJob $appliedjob): bool
    {
        return $user->hasDirectPermission('View Applied Job');
    }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     return $user->hasDirectPermission('Write Applied Job');
    // }

    /**
     * Determine whether the user can update the model.
     */
    // public function update(User $user, AppliedJob $appliedjob): bool
    // {
    //     return $user->hasDirectPermission('Edit Applied Job');
    // }

    /**
     * Determine whether the user can delete the model.
     */
    // public function delete(User $user, AppliedJob $appliedjob): bool
    // {
    //     return $user->hasDirectPermission('Delete Applied Job');
    // }
}
