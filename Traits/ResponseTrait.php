<?php

namespace Apiato\Core\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    public function json($message, int $status = 200, array $headers = [], int $options = 0): JsonResponse
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    public function created($message = null, int $status = 201, array $headers = [], int $options = 0): JsonResponse
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    public function deleted($message = null, int $status = 204, array $headers = [], int $options = 0): JsonResponse
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    public function accepted($message = null, int $status = 202, array $headers = [], int $options = 0): JsonResponse
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    public function noContent(int $status = 204, array $headers = [], int $options = 0): JsonResponse
    {
        return new JsonResponse(null, $status, $headers, $options);
    }
}
