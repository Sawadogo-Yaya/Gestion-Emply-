<?php

namespace App\Policies;

use App\Models\Pays;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaysPolicy
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
       if( $user->hasPermissionTo('Gérer pays')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pays $pays)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if( $user->hasPermissionTo('Gérer pays')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pays $pays)
    {
        if( $user->hasPermissionTo('Gérer pays')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pays $pays)
    {
        if( $user->hasPermissionTo('Gérer pays')){
        return true;
       }
       return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pays $pays)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pays  $pays
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pays $pays)
    {
        //
    }
}
