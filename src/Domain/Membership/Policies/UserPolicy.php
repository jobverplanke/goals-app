<?php

declare(strict_types=1);

namespace Domain\Membership\Policies;

use Domain\Membership\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy
 * @package Domain\Membership\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \Domain\Membership\Models\User $authUser
     *
     * @return mixed
     */
    public function viewAny(User $authUser)
    {
        return $authUser->can('users:view-any');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \Domain\Membership\Models\User $authUser
     * @param \Domain\Membership\Models\User $user
     *
     * @return mixed
     */
    public function view(User $authUser)
    {
        return $authUser->can('users:view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \Domain\Membership\Models\User $authUser
     *
     * @return mixed
     */
    public function create(User $authUser)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \Domain\Membership\Models\User $authUser
     * @param \Domain\Membership\Models\User $user
     *
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \Domain\Membership\Models\User $authUser
     * @param \Domain\Membership\Models\User $user
     *
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \Domain\Membership\Models\User $authUser
     * @param \Domain\Membership\Models\User $user
     *
     * @return mixed
     */
    public function restore(User $authUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \Domain\Membership\Models\User $authUser
     * @param \Domain\Membership\Models\User $user
     *
     * @return mixed
     */
    public function forceDelete(User $authUser, User $user)
    {
        //
    }
}
