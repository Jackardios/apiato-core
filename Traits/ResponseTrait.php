<?php

namespace Apiato\Core\Traits;

use Illuminate\Http\JsonResponse;
use ReflectionClass;

trait ResponseTrait
{
    protected array $metaData = [];

    public function withMeta($data): self
    {
        $this->metaData = $data;

        return $this;
    }

    public function json($message, $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    public function created($message = null, $status = 201, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    public function deleted($responseArray = null): JsonResponse
    {
        if (!$responseArray) {
            return $this->accepted();
        }

        $id = $responseArray->getKey();
        $className = (new ReflectionClass($responseArray))->getShortName();

        return $this->accepted([
            'message' => "$className ($id) Deleted Successfully.",
        ]);
    }

    public function accepted($message = null, $status = 202, array $headers = [], $options = 0): JsonResponse
    {
        return new JsonResponse($message, $status, $headers, $options);
    }

    public function noContent($status = 204): JsonResponse
    {
        return new JsonResponse(null, $status);
    }
}
