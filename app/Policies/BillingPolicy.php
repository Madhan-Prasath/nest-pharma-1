<?php

namespace App\Policies;

use App\Models\Billing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillingPolicy
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
        if ($user->can('viewAny billings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Billing $billing)
    {
        if ($user->can('view billings')) {
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
        if ($user->can('create billings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Billing $billing)
    {
        if ($user->can('edit billings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Billing $billing)
    {
        if ($user->can('delete billings')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Billing $billing)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Billing $billing)
    {
        //
    }
}
