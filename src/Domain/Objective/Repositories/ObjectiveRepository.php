<?php

declare(strict_types=1);

namespace Domain\Objective\Repositories;

use Domain\Objective\Builders\ObjectiveBuilder;
use Domain\Objective\DataTransferObjects\Objective\StoreObjectiveDTO;
use Domain\Objective\Models\Objective;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ObjectiveRepository
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class ObjectiveRepository extends AbstractRepository
{
    private ObjectiveBuilder $objectiveBuilder;

    public function __construct(Objective $objective)
    {
        $this->model = $objective;
        $this->objectiveBuilder = new ObjectiveBuilder($objective::query(), null);
        $this->objectiveBuilder->setModel($objective);
    }

    public function store(StoreObjectiveDTO $dto)
    {
        $objective = $this->objectiveBuilder->create([
            'user_id' => $dto->getUserId(),
            'uuid' => $dto->getUuid()->toString(),
            'name' => $dto->getName(),
            'description' => $dto->getDescription(),
            'vision' => $dto->getVision(),
            'ambition' => $dto->getAmbition(),
            'term' => $dto->getTerm()
        ]);

        $this->validateModelCreation($objective);

        return $objective;
    }

    public function findOrFail(int $id)
    {
        return $this->objectiveBuilder->findOrFail($id);
    }

    public function paginate(?int $perPage, $query): LengthAwarePaginator
    {
        return $this->objectiveBuilder->getPaginated($perPage, $query);
    }

    public function update(int $id)
    {
        $objective = $this->findOrFail($id);

        $objective->setAttribute('name', 'UPDATED');
        $objective->save();

        dd($this->objectiveBuilder->getModel()->save());
    }
}
