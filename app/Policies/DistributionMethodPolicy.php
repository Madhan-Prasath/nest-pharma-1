<?php

namespace App\Policies;

use App\Models\DistributionMethod;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistributionMethodPolicy
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
        if ($user->can('viewAny distribution_methods')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DistributionMethod  $distributionMethod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DistributionMethod $distributionMethod)
    {
        //
        if ($user->can('view distribution_methods')) {
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
        if ($user->can('create distribution_methods')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DistributionMethod  $distributionMethod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DistributionMethod $distributionMethod)
    {
        //
        if ($user->can('edit distribution_methods')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DistributionMethod  $distributionMethod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DistributionMethod $distributionMethod)
    {
        //
        if ($user->can('delete distribution_methods')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DistributionMethod  $distributionMethod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DistributionMethod $distributionMethod)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DistributionMethod  $distributionMethod
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DistributionMethod $distributionMethod)
    {
        //
    }
}
