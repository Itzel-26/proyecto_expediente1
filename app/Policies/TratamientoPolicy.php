<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tratamiento;
use Illuminate\Auth\Access\Response;

class TratamientoPolicy
{
    /**
     * Determina si el usuario puede ver el listado.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Determina si el usuario puede ver un tratamiento individual.
     */
    public function view(User $user, Tratamiento $tratamiento): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Determina si puede crear.
     */
    public function create(User $user): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);// Cambia si tienes roles (ej: $user->doctor == 1)
    }

    /**
     * Determina si puede actualizar.
     */
    public function update(User $user, Tratamiento $tratamiento): bool
    {
      return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Determina si puede borrar.
     */
    public function delete(User $user, Tratamiento $tratamiento): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }
}
