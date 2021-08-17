<?php

namespace Apiato\Core\Traits\TestsTraits\PhpUnit;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

trait TestsUrlHelperTrait
{
    public function addQueryParametersToUrl(string $url, array $queryParameters = []): string
    {
        $queryString = http_build_query($queryParameters);

        if ($queryString) {
            if(Str::contains($url, '?')) {
                $queryString = '&' . $queryString;
            } else {
                $queryString = '?' . $queryString;
            }
        }

        return rtrim($url, '/') . $queryString;
    }

    public function trimSlashes($path): string {
        return trim($path, '/');
    }

    public function buildUrl(string $path, array $queryParameters = []): string
    {
        if($this->isAbsoluteUrl($path)) {
            return $this->addQueryParametersToUrl($path, $queryParameters);
        }

        $apiDomain = $this->trimSlashes(Config::get('apiato.api.domain'));
        $url = $apiDomain.'/'.$this->trimSlashes($path);

        return $this->addQueryParametersToUrl($url, $queryParameters);
    }

    public function buildApiUrl(string $path, array $queryParameters = []): string
    {
        if($this->isAbsoluteUrl($path)) {
            return $this->addQueryParametersToUrl($path, $queryParameters);
        }

        $apiDomain = $this->trimSlashes(Config::get('apiato.api.domain'));
        $apiPrefix = $this->trimSlashes(Config::get('apiato.api.prefix'));
        $url = $apiDomain.'/'.$apiPrefix.'/'.$this->trimSlashes($path);

        return $this->addQueryParametersToUrl($url, $queryParameters);
    }

    public function isAbsoluteUrl(string $url): bool
    {
        return Str::startsWith($url, ['http://', 'https://']);
    }
}
