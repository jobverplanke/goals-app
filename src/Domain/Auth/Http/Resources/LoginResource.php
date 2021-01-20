<?php

declare(strict_types=1);

namespace Domain\Auth\Http\Resources;

use Domain\Membership\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LoginResource
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class LoginResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function toArray($request): array
    {
        return $this->buildResponse(
            $request->user()
        );
    }

    private function buildResponse(User $user): array
    {
        return [
            'name' => $user->getAttribute('name'),
            'email' => $user->getAttribute('email'),
            'profile_photo' => $this->when(
                $user->getAttribute('profile_photo_path') === null,
                '',
                $user->getAttribute('profile_photo_path')
            ),

            'verified_at' => $this->when(
                ! $user->isVerified(),
                'Email not yet verified.',
                $user->getAttribute('email_verified_at')->format('Y-m-d H:i:s')
            ),

            'created_at' => $this->when(
                $user->getAttribute('created_at') === null,
                null,
                $user->getAttribute('created_at')->format('Y-m-d H:i:s')
            ),

            'updated_at' => $this->when(
                $user->getAttribute('updated_at') === null,
                null,
                $user->getAttribute('updated_at')->format('Y-m-d H:i:s')
            ),

            'permissions' => $user->getAllPermissions()->pluck('name'),
        ];
    }
}
