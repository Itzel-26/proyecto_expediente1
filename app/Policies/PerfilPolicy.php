<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Perfil;
use Illuminate\Auth\Access\Response;

class PerfilPolicy
{
    /**
     * Determina si el usuario puede ver el listado.
     */
    public function viewAny(User $user)
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera','paciente']);
        // Permitir listado
    }

    /**
     * Determina si el usuario puede ver un perfil.
     */
    public function view(User $user, Perfil $perfil)
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera','paciente']);
    }

    /**
     * Determina si el usuario puede crear un perfil.
     */
    public function create(User $user)
    {
        return in_array($user->rol, ['admin', 'doctor', 'enfermera','paciente']);
    }

    /**
     * Determina si el usuario puede actualizar un perfil.
     */
    public function update(User $user, Perfil $perfil)
    {
        return true;
    }

    /**
     * Determina si el usuario puede eliminar un perfil.
     */
    public function delete(User $user, Perfil $perfil)
    {
        return true;
    }
}
