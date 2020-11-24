<?php

declare(strict_types=1);

namespace Domain\App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\Exceptions\InvalidFilterQuery;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->invalidFilterQuery();
    }

    /**
     * @return \Domain\App\Exceptions\Handler
     */
    private function invalidFilterQuery(): Handler
    {
        return $this->renderable(function (InvalidFilterQuery $exception) {
            return new JsonResponse([
                'error' => [
                    'status' => Response::HTTP_BAD_REQUEST,
                    'code' => $exception->getCode(),
                    'title' => 'Invalid Query Filter(s)',
                    'message' => "Requested filter(s) `{$exception->unknownFilters->implode(', ')}` are not allowed.",
                ]
            ], Response::HTTP_BAD_REQUEST);
        });
    }
}
