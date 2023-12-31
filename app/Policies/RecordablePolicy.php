<?php

namespace App\Policies;

use App\Models\BaseModels\Recordable;
use App\Models\User;

class RecordablePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Recordable');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Recordable $recordable): bool
    {
        return $user->checkPermissionTo('view Recordable');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Recordable');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Recordable $recordable): bool
    {
        return $user->checkPermissionTo('update Recordable');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Recordable $recordable): bool
    {
        return $user->checkPermissionTo('delete Recordable');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Recordable $recordable): bool
    {
        return $user->checkPermissionTo('restore Recordable');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Recordable $recordable): bool
    {
        return $user->checkPermissionTo('force-delete Recordable');
    }
}
