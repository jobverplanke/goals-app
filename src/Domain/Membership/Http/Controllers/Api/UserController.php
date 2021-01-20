<?php

declare(strict_types=1);

namespace Domain\Membership\Http\Controllers\Api;

use Domain\App\Http\Controllers\Controller;
use Domain\Membership\Http\Requests\User\StoreUserRequest;
use Domain\Membership\Http\Resources\User\UserResource;
use Domain\Membership\Http\Resources\User\UserResourceCollection;
use Domain\Membership\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package \Domain\Membership\Http\Controllers
 */
class UserController extends Controller
{
    private UserService $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index(Request $request): UserResourceCollection
    {
//        $this->authorize('users:view-any');

        $users = $this->user->paginate($request);

        return new UserResourceCollection($users);
    }

    public function store(StoreUserRequest $request): UserResource
    {
        return new UserResource($this->user->createFromRequest($request));
    }

    public function show(Request $request): UserResource
    {
        $this->authorize('view', $request->user());

        return new UserResource($request->user());
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }
}
