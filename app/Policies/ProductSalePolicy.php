<?php

namespace App\Policies;

use App\Models\ProductSale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductSalePolicy
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
        if ($user->can('viewAny product_sales')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ProductSale $productSale)
    {
        //
        if ($user->can('view product_sales')) {
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
        if ($user->can('create product_sales')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductSale $productSale)
    {
        //
        if ($user->can('edit product_sales')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ProductSale $productSale)
    {
        //
        if ($user->can('delete product_sales')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ProductSale $productSale)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductSale  $productSale
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ProductSale $productSale)
    {
        //
    }
}
