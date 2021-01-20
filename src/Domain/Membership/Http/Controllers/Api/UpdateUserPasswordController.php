<?php

declare(strict_types=1);

namespace Domain\Membership\Http\Controllers\Api;

use Domain\App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPasswordController extends Controller
{
    public function __invoke(Request $request, UpdatesUserPasswords $userPassword)
    {
        $userPassword->update($request->user(), $request->all());
    }
}
