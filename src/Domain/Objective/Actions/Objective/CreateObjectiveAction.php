<?php

declare(strict_types=1);

namespace Domain\Objective\Actions\Objective;

use Domain\Objective\DataTransferObjects\Objective\StoreObjectiveDTO;
use Domain\Objective\Models\Objective;
use Domain\Objective\Repositories\ObjectiveRepository;

/**
 * Class CreateObjectiveAction
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class CreateObjectiveAction
{
    private ObjectiveRepository $objectiveRepository;

    private SendObjectiveMailAction $sendObjectiveMailAction;

    public function __construct(ObjectiveRepository $objectiveRepository, SendObjectiveMailAction $sendObjectiveMailAction)
    {
        $this->objectiveRepository = $objectiveRepository;
        $this->sendObjectiveMailAction = $sendObjectiveMailAction;
    }

    public function execute(array $data, $notify = false): Objective
    {
        /** @var \Domain\Objective\Models\Objective $objective */
        $objective = $this->objectiveRepository->store(
            $this->createObjectiveFrom($data)
        );

        if ($notify) {
            $this->sendObjectiveMailAction->execute($objective);
        }

        return $objective;
    }

    private function createObjectiveFrom(array $data): StoreObjectiveDTO
    {
        return StoreObjectiveDTO::make(
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
