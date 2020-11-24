<?php

declare(strict_types=1);

namespace Domain\Objective\Routes;

use Domain\App\Contracts\Router as RouterContract;
use Domain\Objective\Http\Controllers\Api\ObjectiveController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class ObjectiveRoutes implements RouterContract
{
    public static function api(): void
    {
        Route::prefix('api')->middleware(['api', 'auth:sanctum'])->group(function (Router $router) {
            $router->prefix('objectives')->group(function (Router $router) {
                $router->get('/', [ObjectiveController::class, 'index'])->name('objectives.index');
                $router->post('/', [ObjectiveController::class, 'store'])->name('objectives.store');
                $router->patch('/{id}', [ObjectiveController::class, 'update'])->name('objectives.update');
            });
        });
    }

    public static function web(): void
    {
    }
}
