<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Diagnostico;
use Illuminate\Auth\Access\Response;

class DiagnosticoPolicy
{
    /**
     * Ver todos los diagnósticos.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->rol, ['admin', 'doctor']);
    }

    /**
     * Ver un diagnóstico.
     */
    public function view(User $user, Diagnostico $diagnostico): bool
    {
        return in_array($user->rol, ['admin', 'doctor']);
    }

    /**
     * Crear diagnósticos.
     */
    public function create(User $user): bool
    {
        return in_array($user->rol, ['admin', 'doctor']);
    }

    /**
     * Actualizar diagnósticos.
     */
    public function update(User $user, Diagnostico $diagnostico): bool
    {
        return in_array($user->rol, ['admin', 'doctor']);
    }

    /**
     * Eliminar diagnósticos.
     */
    public function delete(User $user, Diagnostico $diagnostico): bool
    {
        return in_array($user->rol, ['admin', 'doctor']);
    }

    /**
     * Restaurar registros
     */
    public function restore(User $user, Diagnostico $diagnostico): bool
    {
        return false;
    }

    /**
     * Eliminar permanentemente.
     */
    public function forceDelete(User $user, Diagnostico $diagnostico): bool
    {
        return false;
    }
}
