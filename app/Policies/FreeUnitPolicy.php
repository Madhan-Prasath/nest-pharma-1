<?php

namespace App\Policies;

use App\Models\FreeUnit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FreeUnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        if ($user->can('viewAny free_units')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreeUnit  $freeUnit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FreeUnit $freeUnit)
    {
        //
        if ($user->can('view free_units')) {
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
        //
        if ($user->can('create free_units')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreeUnit  $freeUnit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FreeUnit $freeUnit)
    {
        //
        if ($user->can('edit free_units')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreeUnit  $freeUnit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FreeUnit $freeUnit)
    {
        //
        if ($user->can('delete free_units')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreeUnit  $freeUnit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FreeUnit $freeUnit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreeUnit  $freeUnit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FreeUnit $freeUnit)
    {
        //
    }
}
