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

    /**
     * Render the contents of the given Blade template string.
     *
     * @param string                                        $template
     * @param \Illuminate\Contracts\Support\Arrayable|array $data
     *
     * @return TestView
     */
    protected function blade(string $template, array $data = []): TestView
    {
        $tempDirectory = sys_get_temp_dir();

        if (! in_array($tempDirectory, View::getFinder()->getPaths())) {
            View::addLocation(sys_get_temp_dir());
        }

        $tempFile = tempnam($tempDirectory, 'laravel-blade').'.blade.php';

        file_put_contents($tempFile, $template);

        $view = Str::of($tempFile)->basename()->before('.blade.php');

        return new TestView(view($view, $data));
    }
}
