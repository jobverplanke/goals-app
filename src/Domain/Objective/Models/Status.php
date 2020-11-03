<?php

declare(strict_types=1);

namespace Domain\Objective\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Status extends Model
{
    public const DONE = 'Done';
    public const PENDING = 'Pending';
    public const BUSY = 'Busy';
    public const OPEN = 'Open';
    public const CANCELED = 'Canceled';

    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function statusable(): MorphTo
    {
        return $this->morphTo();
    }
}
