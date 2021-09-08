<?php

declare(strict_types=1);

namespace Cagilo\UI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Orchid\Icons\IconFinder;

class CagiloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap your package's services.
     *
     * @param IconFinder $iconFinder
     *
     * @return void
     */
    public function boot(IconFinder $iconFinder): void
    {
        $this->publishes([
            __DIR__ . '/../config/cagilo.php' => config_path('cagilo.php'),
        ], 'cagilo');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cagilo');

        collect(config('cagilo.components', []))->each(fn($class, $alias) => Blade::component($alias, $class));
        collect(config('cagilo.icons', []))->each(fn($key, $path) => $iconFinder->registerIconDirectory($key, $path));
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cagilo.php', 'cagilo');
    }
}
