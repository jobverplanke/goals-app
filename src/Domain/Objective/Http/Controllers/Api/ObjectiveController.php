<?php

declare(strict_types=1);

namespace Domain\Objective\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Domain\Objective\Actions\CreateObjectiveAction;
use Domain\Objective\Http\Resources\ObjectiveResource;
use Illuminate\Http\Request;

/**
 * Class ObjectiveController
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class ObjectiveController extends Controller
{
    /**
     *
     */
    public function index()
    {

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Domain\Objective\Actions\CreateObjectiveAction $createObjectiveAction
     *
     * @return \Domain\Objective\Http\Resources\ObjectiveResource
     */
    public function store(Request $request, CreateObjectiveAction $createObjectiveAction)
    {
        return new ObjectiveResource(
            $createObjectiveAction->execute($request)
        );
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
