<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Especialidad;
use Illuminate\Auth\Access\Response;

class EspecialidadPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->rol, ['admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Especialidad $especialidad): bool
    {
        return in_array($user->rol, ['admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->rol, ['admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Especialidad $especialidad): bool
    {
        return in_array($user->rol, ['admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Especialidad $especialidad): bool
    {
        return in_array($user->rol, ['admin']);
    }

    public function restore(User $user, Especialidad $especialidad): bool
    {
        return false;
    }

    public function forceDelete(User $user, Especialidad $especialidad): bool
    {
        return false;
    }
}
