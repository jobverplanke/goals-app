<?php

declare(strict_types=1);

namespace Domain\Objective\DataTransferObjects\Objective;

use Ramsey\Uuid\UuidInterface;

class UpdateObjectiveDTO
{
    private int $userId;

    private UuidInterface $uuid;

    private string $name;

    private ?string $description;

    private ?string $vision;

    private ?string $ambition;

    private ?string $term;

    /**
     * StoreObjectiveDTO constructor.
     *
     * @param int $userId
     * @param \Ramsey\Uuid\UuidInterface $uuid
     * @param string $name
     * @param string|null $description
     * @param string|null $vision
     * @param string|null $ambition
     * @param string|null $term
     */
    public function __construct(
        int $userId,
        UuidInterface $uuid,
        string $name,
        ?string $description = null,
        ?string $vision = null,
        ?string $ambition = null,
        ?string $term = null
    ) {
        $this->userId = $userId;
        $this->uuid = $uuid;
        $this->name = $name;
        $this->description = $description;
        $this->vision = $vision;
        $this->ambition = $ambition;
        $this->term = $term;
    }

    public static function make(
        int $userId,
        UuidInterface $uuid,
        string $name,
        ?string $description = null,
        ?string $vision = null,
        ?string $ambition = null,
        ?string $term = null
    ): self {
        return new static($userId, $uuid, $name, $description, $vision, $ambition, $term);
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getVision(): ?string
    {
        return $this->vision;
    }

    /**
     * @return string|null
     */
    public function getAmbition(): ?string
    {
        return $this->ambition;
    }

    /**
     * @return string|null
     */
    public function getTerm(): ?string
    {
        return $this->term;
    }
}
