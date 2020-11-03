<?php

declare(strict_types=1);

namespace Domain\Objective\Models;

use Domain\Membership\Models\User;
use Domain\Objective\Builders\ObjectiveBuilder;
use Domain\Objective\Collections\ObjectiveCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Objective extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'uuid',
        'name',
        'description',
        'vision',
        'ambition',
        'term',
    ];

    protected $dates = [
        'deleted_at',
    ];

//    public function newEloquentBuilder($query): ObjectiveBuilder
//    {
//        return new ObjectiveBuilder($query);
//    }

    public function newCollection(array $models = []): ObjectiveCollection
    {
        return new ObjectiveCollection($models);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function deadline(): MorphOne
    {
        return $this->morphOne(Deadline::class, 'deadlineable');
    }

    public function statuses(): MorphMany
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    public function subObjectives(): HasMany
    {
        return $this->hasMany(SubObjective::class);
    }
}
