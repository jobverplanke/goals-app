<?php

declare(strict_types=1);

namespace Domain\Objective\Builders;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ObjectiveBuilder
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class ObjectiveBuilder extends QueryBuilder
{
    /**
     * @param string|array|null $query
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginated(?int $perPage, $query): LengthAwarePaginator
    {
        return static::for($this->getModel())
            ->allowedFilters($this->getModel()->getFillable())
            ->allowedFields($this->getModel()->getFillable())
            ->paginate($perPage)
            ->appends($query);
    }
}
