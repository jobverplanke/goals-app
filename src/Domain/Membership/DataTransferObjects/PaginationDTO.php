<?php

declare(strict_types=1);

namespace Domain\Membership\DataTransferObjects;

class PaginationDTO
{
    private int $perPage;

    private array $filters;

    private array $fields;

    /**
     * @var string|array|null
     */
    private $query;

    public function __construct(int $perPage, array $filters, array $fields, $query)
    {
        $this->perPage = $perPage;
        $this->filters = $filters;
        $this->fields = $fields;
        $this->query = $query;
    }

    public static function make(int $perPage, array $filters, array $fields, $query): PaginationDTO
    {
        return new self($perPage, $filters, $fields, $query);
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @return array|string|null
     */
    public function getQuery()
    {
        return $this->query;
    }
}
