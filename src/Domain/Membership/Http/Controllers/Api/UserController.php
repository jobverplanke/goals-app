<?php

declare(strict_types=1);

namespace Domain\Membership\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domain\Membership\Http\Requests\User\StoreUserRequest;
use Domain\Membership\Http\Resources\User\UserResource;
use Domain\Membership\Http\Resources\User\UserResourceCollection;
use Domain\Membership\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package Domain\Membership\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var \Domain\Membership\Services\UserService
     */
    private UserService $user;

    /**
     * UserController constructor.
     *
     * @param \Domain\Membership\Services\UserService $user
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Domain\Membership\Http\Resources\User\UserResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request): UserResourceCollection
    {
//        $this->authorize('users:view-any');

        $users = $this->user->paginate($request);

        return new UserResourceCollection($users);
    }

    /**
     * @param \Domain\Membership\Http\Requests\User\StoreUserRequest $request
     *
     * @return \Domain\Membership\Http\Resources\User\UserResource
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request): UserResource
    {
        return new UserResource($this->user->createFromRequest($request));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Domain\Membership\Http\Resources\User\UserResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Request $request): UserResource
    {
        $this->authorize('view', $request->user());

        return new UserResource($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
