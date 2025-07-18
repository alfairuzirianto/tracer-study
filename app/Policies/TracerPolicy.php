<?php

namespace App\Policies;

use App\Models\Tracer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TracerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isDosen();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tracer $tracer): bool
    {
        return $user->isAdmin() || $user->isDosen();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tracer $tracer): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete some models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tracer $tracer): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tracer $tracer): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tracer $tracer): bool
    {
        return $user->isAdmin();
    }
}
