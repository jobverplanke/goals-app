<?php

declare(strict_types=1);

namespace Domain\Objective\Repositories;

use Domain\Objective\Builders\ObjectiveBuilder;
use Domain\Objective\DataTransferObjects\StoreObjectiveDTO;
use Domain\Objective\Models\Objective;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ObjectiveRepository
 * @package Domain\Objective\Repositories
 */
class ObjectiveRepository
{
    /**
     * @var \Domain\Objective\Models\Objective|\Illuminate\Database\Eloquent\Model
     */
    private Model $model;

    /**
     * Use Builder instead of scopes on the model.
     *
     * @var \Domain\Objective\Builders\ObjectiveBuilder
     */
    private ObjectiveBuilder $objectiveBuilder;

    /**
     * ObjectiveRepository constructor.
     *
     * @param \Domain\Objective\Models\Objective $objective
     */
    public function __construct(Objective $objective)
    {
        $this->model = $objective;
        $this->objectiveBuilder = new ObjectiveBuilder(Objective::query(), null);
    }

    /**
     * @param \Domain\Objective\DataTransferObjects\StoreObjectiveDTO $objectiveDTO
     *
     * @return \Domain\Objective\Models\Objective|\Illuminate\Database\Eloquent\Model
     */
    public function store(StoreObjectiveDTO $objectiveDTO)
    {
        return $this->model::create([
            'user_id' => $objectiveDTO->getUserId(),
            'uuid' => $objectiveDTO->getUuid()->toString(),
            'name' => $objectiveDTO->getName(),
            'description' => $objectiveDTO->getDescription(),
            'vision' => $objectiveDTO->getVision(),
            'ambition' => $objectiveDTO->getAmbition(),
            'term' => $objectiveDTO->getTerm(),
        ]);
    }
}
