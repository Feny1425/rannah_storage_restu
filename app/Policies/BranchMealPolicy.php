<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\BranchMeal;
use App\Models\User;

class BranchMealPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any BranchMeal');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BranchMeal $branchmeal): bool
    {
        return $user->checkPermissionTo('view BranchMeal');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create BranchMeal');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BranchMeal $branchmeal): bool
    {
        return $user->checkPermissionTo('update BranchMeal');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BranchMeal $branchmeal): bool
    {
        return $user->checkPermissionTo('delete BranchMeal');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BranchMeal $branchmeal): bool
    {
        return $user->checkPermissionTo('restore BranchMeal');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BranchMeal $branchmeal): bool
    {
        return $user->checkPermissionTo('force-delete BranchMeal');
    }
}
