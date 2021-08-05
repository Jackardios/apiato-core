<?php

namespace Apiato\Core\Abstracts\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource as LaravelJsonResource;

abstract class JsonResource extends LaravelJsonResource
{
    public function created(int $status = 201): JsonResponse
    {
        return $this->toResponse()
                    ->setStatusCode($status);
    }
}
