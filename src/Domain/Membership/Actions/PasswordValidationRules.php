<?php

declare(strict_types=1);

namespace Domain\Membership\Actions;

use Laravel\Fortify\Rules\Password;

/**
 * Part of Fortify
 *
 * Trait PasswordValidationRules
 * @package Domain\Membership\Actions
 */
trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password(), 'confirmed'];
    }
}
