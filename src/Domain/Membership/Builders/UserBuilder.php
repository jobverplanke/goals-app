<?php

declare(strict_types=1);

namespace Domain\Membership\Builders;

use Domain\Membership\DataTransferObjects\PaginationDTO;
use Domain\Membership\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class UserBuilder extends QueryBuilder
{
    private string $entity = User::class;

    public function getPaginated(PaginationDTO $data): LengthAwarePaginator
    {
        return static::for($this->entity)
            ->allowedFilters($data->getFilters())
            ->allowedFields($data->getFields())
            ->paginate($data->getPerPage())
            ->appends($data->getQuery());
    }
}
