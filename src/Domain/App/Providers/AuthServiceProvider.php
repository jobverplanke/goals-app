<?php

declare(strict_types=1);

namespace Domain\App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::guessPolicyNamesUsing(function ($modelClass) {
//            dd('Domain\\' . ucfirst('membership') . '\\Policies\\' . class_basename($modelClass).'Policy');
//        });
    }
}
