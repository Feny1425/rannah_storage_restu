<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Recordables\ProducedMealRecord;
use App\Models\User;

class ProducedMealRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ProducedMealRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProducedMealRecord $producedmealrecord): bool
    {
        return $user->checkPermissionTo('view ProducedMealRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ProducedMealRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProducedMealRecord $producedmealrecord): bool
    {
        return $user->checkPermissionTo('update ProducedMealRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProducedMealRecord $producedmealrecord): bool
    {
        return $user->checkPermissionTo('delete ProducedMealRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProducedMealRecord $producedmealrecord): bool
    {
        return $user->checkPermissionTo('restore ProducedMealRecord');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProducedMealRecord $producedmealrecord): bool
    {
        return $user->checkPermissionTo('force-delete ProducedMealRecord');
    }
}
