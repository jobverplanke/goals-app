<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api'])->group(function () {
    Route::get('users', [\Domain\Membership\Http\Controllers\Api\UserController::class, 'index']);
    Route::post('users', [\Domain\Membership\Http\Controllers\Api\UserController::class, 'store']);

    Route::post('objectives', [\Domain\Objective\Http\Controllers\Api\ObjectiveController::class, 'store']);
    Route::patch('objectives/{id}', [\Domain\Objective\Http\Controllers\Api\ObjectiveController::class, 'update']);
});
