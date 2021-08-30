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

    'components' => [
        'alert'  => Components\Alert::class,
        'avatar' => Components\Avatar::class,
        'device' => Components\Device::class,
        'error'  => Components\Error::class,
        'logout' => Components\Logout::class,
        'meta'   => Components\Meta::class,
    ],
];
