<?php

declare(strict_types=1);

namespace Domain\Objective\Http\Resources\Objective;

use Illuminate\Http\Resources\Json\JsonResource;

class ObjectiveResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'vision' => $this->vision,
            'ambition' => $this->ambition,
            'term' => $this->term,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->when(null === $this->deleted_at, ''),
            'user' => $this->whenLoaded('user')
        ];
    }
}
