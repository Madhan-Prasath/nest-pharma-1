<?php

namespace App\Policies;

use App\Models\Prescription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrescriptionPolicy
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
        if ($user->can('viewAny prescriptions')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Prescription $prescription)
    {
        //
        if ($user->can('view prescriptions')) {
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
        if ($user->can('create prescriptions')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Prescription $prescription)
    {
        //
        if ($user->can('edit prescriptions')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Prescription $prescription)
    {
        //
        if ($user->can('delete prescriptions')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Prescription $prescription)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Prescription $prescription)
    {
        //
    }
}
