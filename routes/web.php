<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn() => view('welcome'));

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', fn(): \Inertia\Response => Inertia\Inertia::render('Dashboard'))->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('objectives', [\Domain\Objective\Http\Controllers\Api\ObjectiveController::class, 'index']);
    Route::post('objectives', [\Domain\Objective\Http\Controllers\Api\ObjectiveController::class, 'store']);

    Route::get('users', [\Domain\Membership\Http\Controllers\Api\UserController::class, 'index']);
    Route::get('test', [\Domain\Membership\Http\Controllers\Api\UserController::class, 'show']);
    Route::post('users', [\Domain\Membership\Http\Controllers\Api\UserController::class, 'store']);
});
