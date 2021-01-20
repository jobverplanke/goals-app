<?php

declare(strict_types=1);

namespace Domain\Membership\Providers;

use Domain\App\View\Components\GuestLayout;
use Domain\Auth\Http\Responses\LoginResponse;
use Domain\Membership\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Fortify;

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
