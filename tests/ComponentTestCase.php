<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests;

use Cagilo\UI\CagiloServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase;

/**
 * Class ComponentTestCase.
 */
abstract class ComponentTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('view:clear');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            CagiloServiceProvider::class,
        ];
    }

    /**
     * @param array $input
     */
    protected function flashOld(array $input): void
    {
        session()->flashInput($input);

        request()->setLaravelSession(session());
    }
}
