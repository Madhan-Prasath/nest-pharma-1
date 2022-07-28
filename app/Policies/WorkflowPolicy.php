<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use Heloufir\FilamentWorkflowManager\Models\Workflow;

class WorkflowPolicy
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
        if ($user->can('viewAny workflows')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Workflow $workflow)
    {
        if ($user->can('view workflows')) {
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
        if ($user->can('create workflows')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Workflow $workflow)
    {
        if ($user->can('edit workflows')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Workflow $workflow)
    {
        if ($user->can('delete workflows')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Workflow $workflow)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Workflow  $workflow
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Workflow $workflow)
    {
        //
    }
}
