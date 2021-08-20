<?php

namespace BladeComponents\Responsive;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ResponsiveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap your package's services.
     *
     * @return void
     */
    public function boot(): void
    {
        Blade::component('responsive', DeviceComponent::class);
    }
}
