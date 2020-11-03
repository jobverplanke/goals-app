<?php

declare(strict_types=1);

namespace Domain\Objective\Services\Objective;

use Domain\Objective\Repositories\ObjectiveRepository;

class ObjectiveService
{
    protected ObjectiveRepository $objectiveRepository;

    public function __construct(ObjectiveRepository $objectiveRepository)
    {
        $this->objectiveRepository = $objectiveRepository;
    }

    public function getRepository(): ObjectiveRepository
    {
        return $this->objectiveRepository;
    }
}
