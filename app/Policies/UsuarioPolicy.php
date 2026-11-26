<?php

namespace App\Policies;

use App\Models\User; // Usuario del sistema (Auth)
use App\Models\Usuario;
use Illuminate\Auth\Access\Response;

class UsuarioPolicy
{
    /**
     * Determina si el usuario puede ver la lista.
     */
    public function viewAny(User $user): bool
    {
        return true; // Ajusta según roles
    }

    /**
     * Ver un usuario específico
     */
    public function view(User $user, Usuario $usuario): bool
    {
        return true;
    }

    /**
     * Crear usuarios
     */
    public function create(User $user): bool
    {
        return true; // Cambiar si deseas que solo admin pueda
    }

    /**
     * Editar usuarios
     */
    public function update(User $user, Usuario $usuario): bool
    {
        return true;
    }

    /**
     * Eliminar usuarios
     */
    public function delete(User $user, Usuario $usuario): bool
    {
        return true;
    }
}
