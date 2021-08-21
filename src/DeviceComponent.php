<?php

namespace EmmyBlade\Responsive;

use Illuminate\View\Component;
use Jenssegers\Agent\Agent;

class DeviceComponent extends Component
{
    /**
     * @var Agent
     */
    protected Agent $agent;

    /**
     * @var array
     */
    protected array $rules = [];

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
        Agent $agent,
        bool  $desktop = false,
        bool  $phone = false,
        bool  $tablet = false,
        bool  $robot = false,
        bool  $other = false
    )
    {
        $this->agent = $agent;

        $this->rules = [
            'desktop' => $desktop,
            'phone'   => $phone,
            'tablet'  => $tablet,
            'robot'   => $robot,
            'other'   => $other,
        ];
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
        return $this->rules[$this->agent->deviceType()];
    }
}
