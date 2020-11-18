<?php

declare(strict_types=1);

namespace Domain\Objective\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domain\Objective\Actions\Objective\CreateObjectiveAction;
use Domain\Objective\Http\Requests\Objective\StoreObjectiveRequest;
use Domain\Objective\Http\Resources\Objective\ObjectiveResource;
use Domain\Objective\Services\Objective\ObjectiveService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class ObjectiveController
 *
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class ObjectiveController extends Controller
{
    private ObjectiveService $objectiveService;

    public function __construct(ObjectiveService $objectiveService)
    {
        $this->objectiveService = $objectiveService;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $objectives = $this->objectiveService
            ->getRepository()
            ->paginate(
                (int) $request->get('perPage')
            );

        return ObjectiveResource::collection(
            $objectives
        );
    }

    public function store(StoreObjectiveRequest $request, CreateObjectiveAction $createObjectiveAction): ObjectiveResource
    {
        return new ObjectiveResource(
            $createObjectiveAction->execute($request->validated(), true)
        );
    }

    public function show(int $id): ObjectiveResource
    {
        $objective = $this->objectiveService
            ->getRepository()
            ->findOrFail($id);

        return new ObjectiveResource(
            $objective
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     */
    public function update(Request $request, int $id)
    {
        $this->objectiveService->getRepository()->update($id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
