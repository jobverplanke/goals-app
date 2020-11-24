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

    public function viewAny(User $authUser)
    {
        return $authUser->can('users:view-any');
    }

    public function view(User $authUser)
    {
        return $authUser->can('users:view');
    }

    public function create(User $authUser)
    {
        //
    }

    public function update(User $authUser, User $user)
    {
        //
    }

    public function delete(User $authUser, User $user)
    {
        //
    }

    public function restore(User $authUser, User $user)
    {
        //
    }

    public function forceDelete(User $authUser, User $user)
    {
        //
    }
}
