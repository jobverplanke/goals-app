<?php

declare(strict_types=1);

namespace Domain\Auth\Http\Responses;

use Domain\Auth\Http\Resources\LoginResource;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

/**
 * Class LoginResponse
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class LoginResponse implements LoginResponseContract
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Domain\Auth\Http\Resources\LoginResource|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if (! $request->wantsJson()) {
            return new RedirectResponse(config('app.url'));
        }

        return LoginResource::make($request);
    }
}
