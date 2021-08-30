<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class Logout extends Component
{
    /**
     * Attribute specifies where to send
     * the form-data when a form is submitted.
     *
     * @var string
     */
    public string $action;

    /**
     * @param string $action
     */
    public function __construct(string $action = 'logout')
    {
        $this->action = Route::has($action) ? route($action) : $action;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('cagilo::logout');
    }
}
