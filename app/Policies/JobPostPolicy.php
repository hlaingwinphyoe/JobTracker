<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JobPost;
use App\Models\User;

class JobPostPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobPost $jobpost): bool
    {
        return $user->hasDirectPermission('Access Job');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasDirectPermission('Write Job');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobPost $jobpost): bool
    {
        return $user->hasDirectPermission('Edit Job');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobPost $jobpost): bool
    {
        return $user->hasDirectPermission('Delete Job');
    }
}
