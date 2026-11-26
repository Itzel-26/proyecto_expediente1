<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Auth\Access\Response;

class PacientePolicy
{
    /**
     * Determina si el usuario puede ver la lista.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Determina si el usuario puede ver un registro.
     */
    public function view(User $user, Paciente $paciente): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Determina si puede crear.
     */
    public function create(User $user): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Determina si puede actualizar.
     */
    public function update(User $user, Paciente $paciente): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    /**
     * Determina si puede eliminar.
     */
    public function delete(User $user, Paciente $paciente): bool
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera']);
    }

    public function restore(User $user, Paciente $paciente): bool
    {
        return false;
    }

    public function forceDelete(User $user, Paciente $paciente): bool
    {
        return false;
    }
}
