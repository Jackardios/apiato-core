<?php

namespace Apiato\Core\Abstracts\Requests;

use Apiato\Core\Traits\SanitizerTrait;
use Apiato\Core\Traits\StateKeeperTrait;
use Jackardios\JsonApiRequest\JsonApiRequest as BaseJsonApiRequest;

abstract class JsonApiRequest extends BaseJsonApiRequest
{
    use StateKeeperTrait;
    use SanitizerTrait;
}
