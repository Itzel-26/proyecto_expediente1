<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CatalogoMedicamentos;
use Illuminate\Auth\Access\Response;

class CatalogoMedicamentosPolicy
{
    /**
     * Determinar si el usuario puede ver cualquier registro.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Determinar si el usuario puede ver un registro.
     */
    public function view(User $user, CatalogoMedicamentos $medicamento): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Determinar si el usuario puede crear un registro.
     */
    public function create(User $user): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Determinar si el usuario puede actualizar un registro.
     */
    public function update(User $user, CatalogoMedicamentos $medicamento): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Determinar si el usuario puede eliminar un registro.
     */
    public function delete(User $user, CatalogoMedicamentos $medicamento): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Restaurar (no se usa).
     */
    public function restore(User $user, CatalogoMedicamentos $medicamento): bool
    {
        return false;
    }

    /**
     * Eliminar permanentemente (no se usa).
     */
    public function forceDelete(User $user, CatalogoMedicamentos $medicamento): bool
    {
        return false;
    }
}
