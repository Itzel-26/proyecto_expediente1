<?php

namespace App\Policies;

use App\Models\User; // Cambia si tu modelo de usuario se llama diferente
use App\Models\Personal;
use Illuminate\Auth\Access\Response;

class PersonalPolicy
{
    /**
     * Determina si el usuario puede ver el listado.
     */
    public function viewAny(User $user)
    {
        return in_array($user->rol, ['admin']);
    }

    /**
     * Determina si el usuario puede ver un registro.
     */
    public function view(User $user, Personal $personal)
    {
         return in_array($user->rol, ['admin']);
    }

    /**
     * Determina si puede crear personal.
     */
    public function create(User $user)
    {
         return in_array($user->rol, ['admin']);
    }

    /**
     * Determina si puede actualizar.
     */
    public function update(User $user, Personal $personal)
    {
         return in_array($user->rol, ['admin']);
    }

    /**
     * Determina si puede eliminar.
     */
    public function delete(User $user, Personal $personal)
    {
         return in_array($user->rol, ['admin']);
    }
}
