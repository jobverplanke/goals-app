<?php

declare(strict_types=1);

namespace Domain\Membership\Services;

use Domain\Membership\Actions\CreateNewUser;
use Domain\Membership\Builders\UserBuilder;
use Domain\Membership\DataTransferObjects\PaginationDTO;
use Domain\Membership\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

/**
 * Class UserService
 * @package Domain\Membership\Services
 */
class UserService
{
    private UserBuilder $builder;

    private User $user;

    /**
     * @var array|string[]
     */
    private array $allowedFilters = [
        'name',
        'email'
    ];

    /**
     * @var array|string[]
     */
    private array $allowedFields = [
        'id',
        'email',
    ];

    /**
     * @var int
     */
    private int $perPage = 25;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->builder = new UserBuilder(User::query(), null);
    }

    public function getModelAsString()
    {
        return get_class($this->user);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param array $filters
     * @param array $fields
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(Request $request, $filters = [], $fields = []): LengthAwarePaginator
    {
        $data = PaginationDTO::make(
            (int) $request->get('perPage') ?: $this->perPage,
            array_merge($this->allowedFilters, $filters),
            array_merge($this->allowedFields, $fields),
            $request->query(),
        );

        return $this->builder->getPaginated($data);
    }

    public function createFromRequest(Request $request): User
    {
        // call \App\Actions\Fortify\CreateNewUser
        // Send email to new User (offload to Job)
        // $this->dispactch(new NewUserSendEmailJob());


        // return new User model
        return (new CreateNewUser())->create($request->all());
    }
}
