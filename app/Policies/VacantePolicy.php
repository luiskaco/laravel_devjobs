<?php

namespace App\Policies;

use App\User;
use App\Vacante;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // Para zona primiums
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacante  $vacante
     * @return mixed
     */
    public function view(User $user, Vacante $vacante)
    {
        //Solo vea la persona que creo la vacante
        return $user->id===$vacante->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacante  $vacante
     * @return mixed
     */
    public function update(User $user, Vacante $vacante)
    {
        // Solo el que la creo puede actualizar
        return $user->id===$vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacante  $vacante
     * @return mixed
     */
    public function delete(User $user, Vacante $vacante)
    {
        // Solo el que la creo puede eliminar
        return $user->id===$vacante->user_id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacante  $vacante
     * @return mixed
     */
    public function restore(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacante  $vacante
     * @return mixed
     */
    public function forceDelete(User $user, Vacante $vacante)
    {
        //
    }
}
