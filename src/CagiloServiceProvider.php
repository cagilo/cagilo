<?php

declare(strict_types=1);

namespace Cagilo\UI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CagiloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap your package's services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cagilo');

        collect(config('cagilo.components', []))->each(fn($class, $alias) => Blade::component($class, $alias));
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cagilo.php', 'cagilo');
    }
}
