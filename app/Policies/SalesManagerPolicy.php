<?php

namespace App\Policies;

use App\Models\SalesManager;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalesManagerPolicy
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
        if ($user->can('viewAny sales_managers')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesManager  $salesManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SalesManager $salesManager)
    {
        //
        if ($user->can('view sales_managers')) {
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
        if ($user->can('create sales_managers')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesManager  $salesManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SalesManager $salesManager)
    {
        //
        if ($user->can('edit sales_managers')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesManager  $salesManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SalesManager $salesManager)
    {
        //
        if ($user->can('delete sales_managers')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesManager  $salesManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SalesManager $salesManager)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesManager  $salesManager
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SalesManager $salesManager)
    {
        //
    }
}
