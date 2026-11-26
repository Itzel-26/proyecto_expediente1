<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SignosVitales;
use Illuminate\Auth\Access\Response;

class SignosVitalesPolicy
{
    /**
     * Ver listado
     */
    public function viewAny(User $user): bool
    {
         return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Ver un registro específico
     */
    public function view(User $user, SignosVitales $signos): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Crear signos vitales
     */
    public function create(User $user): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Actualizar signos vitales
     */
    public function update(User $user, SignosVitales $signos): bool
    {
        return in_array($user->rol, ['admin','doctor','enfermera']);
    }

    /**
     * Eliminar signos vitales
     */
    public function delete(User $user, SignosVitales $signos): bool
    {
       return in_array($user->rol, ['admin']);
    }
}
