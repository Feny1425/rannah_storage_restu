<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Recordables\ImportExportRecord;
use App\Models\User;

class ImportExportRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ImportExportRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ImportExportRecord $importexportrecord): bool
    {
        return $user->checkPermissionTo('view ImportExportRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ImportExportRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ImportExportRecord $importexportrecord): bool
    {
        return $user->checkPermissionTo('update ImportExportRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ImportExportRecord $importexportrecord): bool
    {
        return $user->checkPermissionTo('delete ImportExportRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ImportExportRecord $importexportrecord): bool
    {
        return $user->checkPermissionTo('restore ImportExportRecord');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ImportExportRecord $importexportrecord): bool
    {
        return $user->checkPermissionTo('force-delete ImportExportRecord');
    }
}
