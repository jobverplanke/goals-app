<?php

declare(strict_types=1);

namespace Domain\Objective\Actions;

use Domain\Objective\DataTransferObjects\StoreObjectiveDTO;
use Domain\Objective\Services\Objective\ObjectiveService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class CreateObjectiveAction
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class CreateObjectiveAction
{
    /**
     * @var \Domain\Objective\Services\Objective\ObjectiveService
     */
    private ObjectiveService $objectiveService;

    /**
     * CreateObjectiveAction constructor.
     *
     * @param \Domain\Objective\Services\Objective\ObjectiveService $objectiveService
     */
    public function __construct(ObjectiveService $objectiveService)
    {
        $this->objectiveService = $objectiveService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Domain\Objective\Models\Objective|\Illuminate\Database\Eloquent\Model
     */
    public function execute(Request $request)
    {
        return $this->objectiveService->getRepository()->store(
            StoreObjectiveDTO::make(
                1,
                Str::uuid(),
                $request->get('name')
            )
        );
    }
}
