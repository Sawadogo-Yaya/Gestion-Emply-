<?php

namespace App\Policies;

use App\Models\Employe;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployePolicy
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
        if( $user->hasPermissionTo('Consulter employe')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Employe $employe)
    {
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
    if( $user->hasPermissionTo('Créer employe')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Employe $employe)
    {
        if( $user->hasPermissionTo('Modifier employe')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Employe $employe)
    {
        if( $user->hasPermissionTo('Supprimer employe')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Employe $employe)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Employe $employe)
    {
        //
    }
}
