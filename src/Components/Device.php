<?php

namespace Cagilo\UI\Components;

use Illuminate\View\Component;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Collection;

class Device extends Component
{
    /**
     * @var Agent
     */
    protected Agent $agent;

    /**
     * @var Collection
     */
    protected Collection $rules;

    /**
     * Create a new component instance.
     *
     * @param \Jenssegers\Agent\Agent $agent
     * @param false                   $desktop
     * @param false                   $phone
     * @param false                   $tablet
     * @param false                   $robot
     * @param false                   $other
     *
     * @return void
     */
    public function __construct(
        Agent       $agent,
        bool|string $desktop = false,
        bool|string $phone = false,
        bool|string $tablet = false,
        bool|string $robot = false,
        bool|string $other = false
    )
    {
        $this->agent = $agent;

        $this->rules = collect([
            'desktop' => $desktop,
            'phone'   => $phone,
            'tablet'  => $tablet,
            'robot'   => $robot,
            'other'   => $other,
        ])->map(fn($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            {{ $slot }}
        blade;
    }

    /**
     * Determine if the component should be rendered.
     *
     * @return bool
     */
    public function shouldRender(): bool
    {
        return $this->rules->get($this->agent->deviceType(), false);
    }
}
