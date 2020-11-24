<?php

declare(strict_types=1);

namespace Domain\Objective\Actions\Objective;

use Domain\Objective\DataTransferObjects\Objective\UpdateObjectiveDTO;
use Domain\Objective\Repositories\ObjectiveRepository;

class UpdateObjectiveAction
{
    private ObjectiveRepository $objectiveRepository;

    public function __construct(ObjectiveRepository $objectiveRepository)
    {
        $this->objectiveRepository = $objectiveRepository;
    }

    public function execute(array $data)
    {
    }

    public function createObjectiveFrom(array $data): UpdateObjectiveDTO
    {
        return UpdateObjectiveDTO::make(
            $data['user_id'],
            $data['uuid'],
            $data['name'],
            $data['description'] ?? null,
            $data['vision'] ?? null,
            $data['ambition'] ?? null,
            $data['term'] ?? null
        );
    }
}
