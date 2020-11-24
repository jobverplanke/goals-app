<?php

declare(strict_types=1);

namespace Domain\Objective\Http\Resources\Objective;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ObjectiveResource
 * @author Job Verplanke <job.verplanke@gmail.com>
 */
class ObjectiveResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        /** @var \Domain\Objective\Models\Objective $objective */
        $objective = $this->resource;

        return [
            'id' => $objective->getAttribute('id'),
            'uuid' => $objective->getAttribute('uuid'),
            'name' => $objective->getAttribute('name'),
            'description' => $objective->getAttribute('description'),
            'vision' => $objective->getAttribute('vision'),
            'ambition' => $objective->getAttribute('ambition'),
            'term' => $objective->getAttribute('term'),
            'created_at' => $this->when(
                $objective->getAttribute('created_at') === null,
                '',
                $objective->getAttribute('created_at')->format('Y-m-d H:i:s')
            ),

            'updated_at' => $this->when(
                $objective->getAttribute('updated_at') === null,
                '',
                $objective->getAttribute('updated_at')->format('Y-m-d H:i:s')
            ),

            'deleted_at' => $this->when(
                $objective->getAttribute('deleted_at') === null,
                '',
                $objective->getAttribute('deleted_at')->format('Y-m-d H:i:s')
            ),

            'user' => $this->whenLoaded('user')
        ];
    }
}
