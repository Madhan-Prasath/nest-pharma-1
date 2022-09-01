<?php

namespace App\Policies;

use App\Models\Patch;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatchPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        if ($user->can('viewAny patches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patch  $patch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Patch $patch)
    {
        if ($user->can('view patches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->can('create patches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patch  $patch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Patch $patch)
    {
        if ($user->can('edit patches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patch  $patch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Patch $patch)
    {
        if ($user->can('delete patches')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patch  $patch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Patch $patch)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Patch  $patch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Patch $patch)
    {
        //
    }
}
