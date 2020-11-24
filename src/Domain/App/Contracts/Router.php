<?php

declare(strict_types=1);

namespace Domain\App\Contracts;

/**
 * Interface Router
 *
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
interface Router
{
    public static function api(): void;

    public static function web(): void;
}
