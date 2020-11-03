<?php

declare(strict_types=1);

namespace Domain\Objective\Builders;

use Domain\Objective\Models\Objective;
use Spatie\QueryBuilder\QueryBuilder;

class ObjectiveBuilder extends QueryBuilder
{
    private string $entity = Objective::class;
}
