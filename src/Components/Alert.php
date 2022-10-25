<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * @var string
     */
    public string $type;

    /**
     * @var \Illuminate\Contracts\Session\Session
     */
    protected $session;

    /**
     * @param \Illuminate\Contracts\Session\Session $session
     * @param string                                $type
     */
    public function __construct(Session $session, string $type = 'alert')
    {
        $this->session = $session;
        $this->type = $type;
    }

    public function render(): View
    {
        return view('cagilo::alert');
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return (string) Arr::first($this->messages());
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return (array) session()->get($this->type);
    }

    /**
     * Determine if the component should be rendered.
     *
     * @return bool
     */
    public function shouldRender(): bool
    {
        return session()->has($this->type) && ! empty($this->messages());
    }
}
