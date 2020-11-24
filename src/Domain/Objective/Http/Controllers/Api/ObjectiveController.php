<?php

declare(strict_types=1);

namespace Domain\Objective\Http\Controllers\Api;

use Domain\App\Http\Controllers\Controller;
use Domain\Objective\Actions\Objective\CreateObjectiveAction;
use Domain\Objective\Http\Requests\Objective\StoreObjectiveRequest;
use Domain\Objective\Http\Resources\Objective\ObjectiveResource;
use Domain\Objective\Repositories\ObjectiveRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class ObjectiveController
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class ObjectiveController extends Controller
{
    private ObjectiveRepository $objectiveRepository;

    public function __construct(ObjectiveRepository $objectiveRepository)
    {
        $this->objectiveRepository = $objectiveRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $objectives = $this->objectiveRepository
            ->paginate(
                (int) $request->get('perPage'),
                $request->query()
            );

        return ObjectiveResource::collection(
            $objectives
        );
    }

    public function store(StoreObjectiveRequest $request, CreateObjectiveAction $createObjectiveAction): ObjectiveResource
    {
        return new ObjectiveResource(
            $createObjectiveAction
                ->execute($request->validated(), true)
                ->load('user')
        );
    }

    public function show(int $id): ObjectiveResource
    {
        $objective = $this->objectiveRepository
            ->findOrFail($id);

        return new ObjectiveResource(
            $objective
        );
    }

    /**
     * @param $id
     */
    public function update(int $id)
    {
        return $this->objectiveRepository->update($id);
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
