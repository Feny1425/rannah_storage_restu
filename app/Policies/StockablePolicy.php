<?php

namespace App\Policies;

use App\Models\BaseModels\Stockable;
use App\Models\User;

class StockablePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Stockable');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Stockable $stockable): bool
    {
        return $user->checkPermissionTo('view Stockable');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Stockable');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Stockable $stockable): bool
    {
        return $user->checkPermissionTo('update Stockable');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Stockable $stockable): bool
    {
        return $user->checkPermissionTo('delete Stockable');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Stockable $stockable): bool
    {
        return $user->checkPermissionTo('restore Stockable');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Stockable $stockable): bool
    {
        return $user->checkPermissionTo('force-delete Stockable');
    }
}
