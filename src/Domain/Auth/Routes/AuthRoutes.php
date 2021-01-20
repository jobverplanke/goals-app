<?php

declare(strict_types=1);

namespace Domain\Auth\Routes;

use Domain\App\Contracts\Router;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthRoutes implements Router
{

    public static function api(): void
    {
        // TODO: Implement api() method.
    }

    public static function web(): void
    {
        Route::get('/', fn() => view('welcome'));
        Route::middleware(['auth:sanctum', 'verified'])->get(
            '/dashboard',
            fn(): Response => Inertia::render('Dashboard')
        )->name('dashboard');
    }
}
