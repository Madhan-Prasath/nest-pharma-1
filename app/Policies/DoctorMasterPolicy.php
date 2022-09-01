<?php

namespace App\Policies;

use App\Models\DoctorMaster;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorMasterPolicy
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
        if ($user->can('viewAny doctor_masters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorMaster  $doctorMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DoctorMaster $doctorMaster)
    {
        //
        if ($user->can('view doctor_masters')) {
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
        if ($user->can('create doctor_masters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorMaster  $doctorMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DoctorMaster $doctorMaster)
    {
        //
        if ($user->can('edit doctor_masters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorMaster  $doctorMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DoctorMaster $doctorMaster)
    {
        //
        if ($user->can('delete doctor_masters')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorMaster  $doctorMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DoctorMaster $doctorMaster)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorMaster  $doctorMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DoctorMaster $doctorMaster)
    {
        //
    }
}
