<?php

namespace App\Policies;

use App\Models\Stockist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StockistPolicy
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
        if ($user->can('viewAny stockists')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stockist  $stockist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Stockist $stockist)
    {
        //
        if ($user->can('view stockists')) {
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
        if ($user->can('create stockists')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stockist  $stockist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Stockist $stockist)
    {
        //
        if ($user->can('edit stockists')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stockist  $stockist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Stockist $stockist)
    {
        //
        if ($user->can('delete stockists')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stockist  $stockist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Stockist $stockist)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Stockist  $stockist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Stockist $stockist)
    {
        //
    }
}
