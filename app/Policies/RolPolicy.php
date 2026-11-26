<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Rol;

class RolPolicy
{
    // Ver listado
    public function viewAny(User $user)
    {
         return in_array($user->rol, ['admin']);
    }

    // Ver un rol en específico
    public function view(User $user, Rol $rol)
    {
         return in_array($user->rol, ['admin']);
    }

    // Crear rol
    public function create(User $user)
    {
         return in_array($user->rol, ['admin']);
    }

    // Actualizar
    public function update(User $user, Rol $rol)
    {
        return in_array($user->rol, ['admin']);
    }

    // Eliminar
    public function delete(User $user, Rol $rol)
    {
         return in_array($user->rol, ['admin']);
    }
}
