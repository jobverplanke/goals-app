<?php

declare(strict_types=1);

namespace Domain\App\Providers;

use Domain\App\Actions\Fortify\ResetUserPassword;
use Domain\App\Actions\Fortify\UpdateUserPassword;
use Domain\App\Actions\Fortify\UpdateUserProfileInformation;
use Domain\Membership\Actions\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }
}
