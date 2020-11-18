<?php

declare(strict_types=1);

namespace Domain\Objective\Actions\Objective;

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
//        $objective = UpdateObjectiveDTO::make(
//            $data['']
//        );
    }
}
