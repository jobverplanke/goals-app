<?php

declare(strict_types=1);

namespace Domain\Objective\Exceptions;

use Exception;
use Throwable;

class ModelNotSavedException extends Exception
{
    public function __construct($message, $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
