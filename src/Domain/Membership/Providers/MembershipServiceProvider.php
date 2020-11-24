<?php

declare(strict_types=1);

namespace Domain\Membership\Providers;

use Domain\Auth\Http\Responses\LoginResponse;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class MembershipServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            LoginResponseContract::class,
            LoginResponse::class
        );
    }
}
