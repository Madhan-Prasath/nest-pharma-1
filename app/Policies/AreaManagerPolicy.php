<?php

namespace App\Policies;

use App\Models\AreaManager;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AreaManagerPolicy
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
        if ($user->can('viewAny area_managers')) {
            return true;
        }

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AreaManager  $areaManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AreaManager $areaManager)
    {
        //
        if ($user->can('view area_managers')) {
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
        if ($user->can('create area_managers')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AreaManager  $areaManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AreaManager $areaManager)
    {
        //
        if ($user->can('edit area_managers')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AreaManager  $areaManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AreaManager $areaManager)
    {
        //
        if ($user->can('delete area_managers')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AreaManager  $areaManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AreaManager $areaManager)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AreaManager  $areaManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AreaManager $areaManager)
    {
        //
    }
}
