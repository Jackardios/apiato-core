<?php

namespace Apiato\Core\Traits\TestsTraits\PhpUnit;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

trait TestsRequestHelperTrait
{
    public function buildUrl(string $uri, array $queryParameters = []): string
    {
        if (!Str::startsWith($uri, '/')) {
            $uri = '/' . $uri;
        }

        $baseUrl = Config::get('apiato.api.url') . $uri;
        $queryString = http_build_query($queryParameters);

        if ($queryString) {
            if(Str::contains($baseUrl, '?')) {
                $queryString = '&' . $queryString;
            } else {
                $queryString = '?' . $queryString;
            }
        }

        return $baseUrl . $queryString;
    }
}
