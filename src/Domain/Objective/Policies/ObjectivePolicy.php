<?php

declare(strict_types=1);

namespace Domain\Objective\Policies;

use Domain\Membership\Models\User;
use Domain\Objective\Models\Objective;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ObjectivePolicy
 * @package Objective\Policies
 */
class ObjectivePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('objective:view-any');
    }

    public function view(User $user): bool
    {
        return $user->can('objective:create');
    }

    public function create(User $user): bool
    {
        return $user->can('objective:create');
    }

    public function update(User $user, Objective $objective): bool
    {
        if (! $user->can('objective:update') && ! $objective->user_id === $user->id) {
            return false;
        }

        return true;
    }
}
