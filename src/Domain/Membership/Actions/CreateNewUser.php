<?php

declare(strict_types=1);

namespace Domain\Membership\Actions;

use Domain\Membership\Models\Team;
use Domain\Membership\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Permission;

/**
 * Part of Fortify
 *
 * Class CreateNewUser
 * @package App\Actions
 */
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param array $input
     *
     * @throws \Throwable
     * @return \Domain\Membership\Models\User
     */
    public function create(array $input): User
    {
        return DB::transaction(
            fn (): User => tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                Permission::create([
                    'name' => 'objective:create'
                ]);

                $user->givePermissionTo([
                    'objective:create'
                ]);

                $this->createTeam($user);
            })
        );
    }

    /**
     * Create a personal team for the user.
     *
     * @param \Domain\Membership\Models\User $user
     *
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
