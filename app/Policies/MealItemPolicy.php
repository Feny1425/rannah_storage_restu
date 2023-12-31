<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MealItem;
use App\Models\User;

class MealItemPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any MealItem');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MealItem $mealitem): bool
    {
        return $user->checkPermissionTo('view MealItem');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create MealItem');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MealItem $mealitem): bool
    {
        return $user->checkPermissionTo('update MealItem');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MealItem $mealitem): bool
    {
        return $user->checkPermissionTo('delete MealItem');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MealItem $mealitem): bool
    {
        return $user->checkPermissionTo('restore MealItem');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MealItem $mealitem): bool
    {
        return $user->checkPermissionTo('force-delete MealItem');
    }
}
