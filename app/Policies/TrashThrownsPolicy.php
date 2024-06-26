<?php

namespace App\Policies;

use App\Models\User;
use App\Models\trashThrowns;
use Illuminate\Auth\Access\Response;

class TrashThrownsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, trashThrowns $trashThrowns): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, trashThrowns $trashThrowns): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, trashThrowns $trashThrowns): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, trashThrowns $trashThrowns): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, trashThrowns $trashThrowns): bool
    {
        //
    }
}
