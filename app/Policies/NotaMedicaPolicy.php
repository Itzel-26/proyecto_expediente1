<?php

namespace App\Policies;

use App\Models\User;
use App\Models\NotaMedica;
use Illuminate\Auth\Access\Response;

class NotaMedicaPolicy
{
    /**
     * Determinar si el usuario puede ver el listado.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Determinar si el usuario puede ver una nota médica específica.
     */
    public function view(User $user, NotaMedica $notaMedica): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera','paciente']);
    }

    /**
     * Determinar si el usuario puede crear notas médicas.
     */
    public function create(User $user): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Determinar si el usuario puede actualizar una nota médica.
     */
    public function update(User $user, NotaMedica $notaMedica): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Determinar si el usuario puede eliminar una nota médica.
     */
    public function delete(User $user, NotaMedica $notaMedica): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Restaurar
     */
    public function restore(User $user, NotaMedica $notaMedica): bool
    {
        return false;
    }

    /**
     * Eliminar permanente
     */
    public function forceDelete(User $user, NotaMedica $notaMedica): bool
    {
        return false;
    }
}
