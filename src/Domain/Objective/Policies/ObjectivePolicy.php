<?php

declare(strict_types=1);

namespace Domain\Objective\Policies;

use Domain\Membership\Models\User;
use Domain\Objective\Models\Objective;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ObjectivePolicy
 * @package Domain\Objective\Policies
 */
class ObjectivePolicy
{
    use HandlesAuthorization;

    /**
     * @param \Domain\Membership\Models\User $user
     *
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('objective:view-any');
    }

    /**
     * @param \Domain\Membership\Models\User $user
     *
     * @return bool
     */
    public function view(User $user): bool
    {
        return $user->can('objective:create');
    }

    /**
     * @param \Domain\Membership\Models\User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('objective:create');
    }

    /**
     * @param \Domain\Membership\Models\User $user
     * @param \Domain\Objective\Models\Objective $objective
     *
     * @return bool
     */
    public function update(User $user, Objective $objective): bool
    {
        if ($user->can('objective:update') && $objective->user_id === $user->id) {
            return true;
        }
    }
}
