<?php

declare(strict_types=1);

namespace Domain\Objective\Models;

use Domain\Objective\Builders\SubObjectiveBuilder;
use Domain\Objective\Collections\SubObjectiveCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class SubObjective extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function newEloquentBuilder($query): SubObjectiveBuilder
    {
        return new SubObjectiveBuilder($query);
    }

    public function newCollection(array $models = []): SubObjectiveCollection
    {
        return new SubObjectiveCollection($models);
    }

    public function deadline(): MorphOne
    {
        return $this->morphOne(Deadline::class, 'deadlineable');
    }

    public function statuses(): MorphMany
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    public function actions(): BelongsToMany
    {
        return $this->belongsToMany(Action::class);
    }

    public function objective(): BelongsTo
    {
        return $this->belongsTo(Objective::class);
    }
}
