<?php

namespace App\Policies;

use App\Models\HeadQuarter;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HeadQuarterPolicy
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
        if ($user->can('viewAny head_quarters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HeadQuarter  $headQuarter
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, HeadQuarter $headQuarter)
    {
        //
        if ($user->can('view head_quarters')) {
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
        if ($user->can('create head_quarters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HeadQuarter  $headQuarter
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, HeadQuarter $headQuarter)
    {
        //
        if ($user->can('edit head_quarters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HeadQuarter  $headQuarter
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, HeadQuarter $headQuarter)
    {
        //
        if ($user->can('delete head_quarters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HeadQuarter  $headQuarter
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, HeadQuarter $headQuarter)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HeadQuarter  $headQuarter
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, HeadQuarter $headQuarter)
    {
        //
    }
}
