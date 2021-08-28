<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Error extends Component
{
    /**
     * @var string
     */
    public string $field;

    /**
     * @var string
     */
    public string $bag;

    /**
     * @param string $field
     * @param string $bag
     */
    public function __construct(string $field, string $bag = 'default')
    {
        $this->field = $field;
        $this->bag = $bag;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('blade-ui-kit::components.forms.error');
    }

    /**
     * @param \Illuminate\Support\ViewErrorBag $errors
     *
     * @return array
     */
    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
