<?php

namespace App\Policies;

use App\Models\BaseModels\BaseModel;
use App\Models\User;

class BaseModelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any BaseModel');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BaseModel $basemodel): bool
    {
        return $user->checkPermissionTo('view BaseModel');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create BaseModel');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BaseModel $basemodel): bool
    {
        return $user->checkPermissionTo('update BaseModel');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BaseModel $basemodel): bool
    {
        return $user->checkPermissionTo('delete BaseModel');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BaseModel $basemodel): bool
    {
        return $user->checkPermissionTo('restore BaseModel');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BaseModel $basemodel): bool
    {
        return $user->checkPermissionTo('force-delete BaseModel');
    }
}
