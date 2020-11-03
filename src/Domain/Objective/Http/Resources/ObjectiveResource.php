<?php

namespace Domain\Objective\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObjectiveResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'user' => $this->whenLoaded('user')
        ];
    }
}
