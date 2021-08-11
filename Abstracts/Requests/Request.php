<?php

namespace Apiato\Core\Abstracts\Requests;

use Apiato\Core\Traits\SanitizerTrait;
use Apiato\Core\Traits\StateKeeperTrait;
use Illuminate\Foundation\Http\FormRequest as LaravelRequest;

abstract class Request extends LaravelRequest
{
    use StateKeeperTrait;
    use SanitizerTrait;
}
