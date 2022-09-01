<?php

namespace App\Policies;

use App\Models\ProductTarget;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductTargetPolicy
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
        if ($user->can('viewAny product_targets')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductTarget  $productTarget
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProductTarget $productTarget)
    {
        //
        if ($user->can('view product_targets')) {
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
        if ($user->can('create product_targets')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductTarget  $productTarget
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductTarget $productTarget)
    {
        //
        if ($user->can('edit product_targets')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductTarget  $productTarget
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProductTarget $productTarget)
    {
        //
        if ($user->can('delete product_targets')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductTarget  $productTarget
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProductTarget $productTarget)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductTarget  $productTarget
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProductTarget $productTarget)
    {
        //
    }
}
