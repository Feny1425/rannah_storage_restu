<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\QuantityEditRecord;
use App\Models\User;

class QuantityEditRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any QuantityEditRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, QuantityEditRecord $quantityeditrecord): bool
    {
        return $user->checkPermissionTo('view QuantityEditRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create QuantityEditRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, QuantityEditRecord $quantityeditrecord): bool
    {
        return $user->checkPermissionTo('update QuantityEditRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, QuantityEditRecord $quantityeditrecord): bool
    {
        return $user->checkPermissionTo('delete QuantityEditRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, QuantityEditRecord $quantityeditrecord): bool
    {
        return $user->checkPermissionTo('restore QuantityEditRecord');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, QuantityEditRecord $quantityeditrecord): bool
    {
        return $user->checkPermissionTo('force-delete QuantityEditRecord');
    }
}
