<?php

namespace Apiato\Core\Abstracts\Tests\PhpUnit;

use Apiato\Core\Traits\TestCaseTrait;
use Apiato\Core\Traits\TestsTraits\PhpUnit\TestsAuthHelperTrait;
use Apiato\Core\Traits\TestsTraits\PhpUnit\TestsUrlHelperTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;

abstract class TestCase extends LaravelTestCase
{
    use TestCaseTrait,
        TestsUrlHelperTrait,
        TestsAuthHelperTrait,
        RefreshDatabase;

    /**
     * Determine if the seed task should be run when refreshing the database.
     */
    protected bool $seed = true;

    /**
     * The base URL to use while testing the application.
     */
    protected string $baseUrl;

    /**
     * Setup the test environment, before each test.
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Reset the test environment, after each test.
     */
    public function tearDown(): void
    {
        parent::tearDown();
    }
}
