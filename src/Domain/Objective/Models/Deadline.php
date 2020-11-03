<?php

declare(strict_types=1);

namespace Domain\Objective\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Deadline extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    public function deadlineable(): MorphTo
    {
        return $this->morphTo();
    }
}
