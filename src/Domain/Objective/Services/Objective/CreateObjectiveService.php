<?php

declare(strict_types=1);

namespace Domain\Objective\Services\Objective;

use Domain\Objective\Actions\CreateObjectiveAction;
use Domain\Objective\Repositories\ObjectiveRepository;
use Illuminate\Http\Request;

class CreateObjectiveService extends ObjectiveService
{
    private $action;

    public function __construct(ObjectiveRepository $objectiveRepository, CreateObjectiveAction $action)
    {
        $this->action = $action;

        parent::__construct($objectiveRepository);
    }

    public function fromRequest(Request $request)
    {
        return $this->objectiveRepository->store(
            $this->action->execute($request)
        );
    }
}
