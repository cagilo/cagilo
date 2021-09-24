<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Submit extends Component
{
    /**
     * Attribute specifies where to send
     * the form-data when a form is submitted.
     *
     * @var string
     */
    public string $action;

    /**
     * The id attribute specifies the form and button.
     *
     * @var string
     */
    public string $formId;

    /**
     * @param string      $action
     * @param string|null $formId
     */
    public function __construct(string $action, string $formId = null)
    {
        $this->action = Route::has($action) ? route($action) : $action;
        $this->formId = $formId ?? (string) Str::uuid();
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('cagilo::submit');
    }
}
