<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

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
    public function __construct(string $action)
    {
        $this->action = $action ?? route('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('cagilo::components.buttons.logout');
    }
}
