<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MeasurementUnit;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeasurementUnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_measurement::unit');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MeasurementUnit  $measurementUnit
     * @return bool
     */
    public function view(User $user, MeasurementUnit $measurementUnit): bool
    {
        return $user->can('view_measurement::unit');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_measurement::unit');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MeasurementUnit  $measurementUnit
     * @return bool
     */
    public function update(User $user, MeasurementUnit $measurementUnit): bool
    {
        return $user->can('update_measurement::unit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MeasurementUnit  $measurementUnit
     * @return bool
     */
    public function delete(User $user, MeasurementUnit $measurementUnit): bool
    {
        return $user->can('delete_measurement::unit');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_measurement::unit');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MeasurementUnit  $measurementUnit
     * @return bool
     */
    public function forceDelete(User $user, MeasurementUnit $measurementUnit): bool
    {
        return $user->can('force_delete_measurement::unit');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_measurement::unit');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MeasurementUnit  $measurementUnit
     * @return bool
     */
    public function restore(User $user, MeasurementUnit $measurementUnit): bool
    {
        return $user->can('restore_measurement::unit');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_measurement::unit');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MeasurementUnit  $measurementUnit
     * @return bool
     */
    public function replicate(User $user, MeasurementUnit $measurementUnit): bool
    {
        return $user->can('replicate_measurement::unit');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_measurement::unit');
    }

}
