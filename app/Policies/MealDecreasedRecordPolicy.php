<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Recordables\MealDecreasedRecord;
use App\Models\User;

class MealDecreasedRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any MealDecreasedRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MealDecreasedRecord $mealdecreasedrecord): bool
    {
        return $user->checkPermissionTo('view MealDecreasedRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create MealDecreasedRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MealDecreasedRecord $mealdecreasedrecord): bool
    {
        return $user->checkPermissionTo('update MealDecreasedRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MealDecreasedRecord $mealdecreasedrecord): bool
    {
        return $user->checkPermissionTo('delete MealDecreasedRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MealDecreasedRecord $mealdecreasedrecord): bool
    {
        return $user->checkPermissionTo('restore MealDecreasedRecord');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MealDecreasedRecord $mealdecreasedrecord): bool
    {
        return $user->checkPermissionTo('force-delete MealDecreasedRecord');
    }
}
