<?php

declare(strict_types=1);

namespace Domain\Objective\Repositories;

use Domain\Objective\Builders\ObjectiveBuilder;
use Domain\Objective\DataTransferObjects\Objective\StoreObjectiveDTO;
use Domain\Objective\Models\Objective;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ObjectiveRepository
 *
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class ObjectiveRepository
{
    private Model $model;

    private ObjectiveBuilder $objectiveBuilder;

    public function __construct(Objective $objective)
    {
        $this->model = $objective;
        $this->objectiveBuilder = new ObjectiveBuilder(Objective::query(), null);
    }

    public function store(StoreObjectiveDTO $objective)
    {
        return $this->objectiveBuilder->create([
            'user_id' => $objective->getUserId(),
            'uuid' => $objective->getUuid()->toString(),
            'name' => $objective->getName(),
            'description' => $objective->getDescription(),
            'vision' => $objective->getVision(),
            'ambition' => $objective->getAmbition(),
            'term' => $objective->getTerm()
        ]);
    }

    public function findOrFail(int $id)
    {
        return $this->objectiveBuilder->findOrFail($id);
    }

    public function paginate(int $perPage): LengthAwarePaginator
    {
        return $this->objectiveBuilder->paginate($perPage);
    }

    public function update(int $id)
    {
        $objective = $this->findOrFail($id);

        $objective->setAttribute('name', 'UPDATED');
        $objective->save();

        dd($this->objectiveBuilder->getModel()->save());
    }
}
