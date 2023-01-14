<?php

use Cagilo\UI\Components;

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Cagilo are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components'  => [
        'alert'  => Components\Alert::class,
        'device' => Components\Device::class,
        'error'  => Components\Error::class,
        'icon'   => Components\Icon::class,
        'logout' => Components\Logout::class,
        'meta'   => Components\Meta::class,
        'submit' => Components\Submit::class,
        'time'   => Components\Time::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Icons Path
    |--------------------------------------------------------------------------
    |
    | Provide the path from your app to your SVG icons directory.
    |
    | Example: [ 'fa' => storage_path('app/fontawesome') ]
    */

    'icons'       => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Date Format
    |--------------------------------------------------------------------------
    |
    | The format will be used when using the time component for custom display
    |
    | Example: https://www.php.net/manual/en/class.datetimeinterface.php
    */

    'date-format' => 'Y-m-d H:i:s',
];
