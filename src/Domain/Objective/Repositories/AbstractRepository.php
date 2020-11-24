<?php

declare(strict_types=1);

namespace Domain\Objective\Repositories;

use Domain\Objective\Exceptions\ModelNotSavedException;
use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    protected Model $model;

    protected function validateModelCreation(Model $model)
    {
        if (! $model->wasRecentlyCreated || ! $model instanceof Model) {
            throw new ModelNotSavedException(
                'Something went wrong while saving the model.',
            );
        }

        // todo: fire event that model is created
    }
}
