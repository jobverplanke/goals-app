<?php

declare(strict_types=1);

namespace Domain\Objective\Models;

use Domain\Objective\Builders\ActionBuilder;
use Domain\Objective\Collections\ActionCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function newCollection(array $models = []): ActionCollection
    {
        return new ActionCollection($models);
    }

    public function newEloquentBuilder($query): ActionBuilder
    {
        return new ActionBuilder($query);
    }

    public function statuses(): MorphMany
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    public function subObjectives(): BelongsToMany
    {
        return $this->belongsToMany(SubObjective::class);
    }
}
