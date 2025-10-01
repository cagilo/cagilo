<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;

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
     * The HTTP method used when submitting the form.
     *
     * @var string|null
     */
    public ?string $method;

    /**
     * @param string $action
     * @param string $method
     * @param string|null $formId
     */
    public function __construct(string $action, string $method = null, ?string $formId = null)
    {
        $this->action = Route::has($action) ? route($action) : $action;
        $this->formId = $formId ?? Str::uuid()->toString();
        $this->method = $method;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('cagilo::submit');
    }
}
