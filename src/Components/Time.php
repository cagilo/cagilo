<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Time extends Component
{
    /**
     * @var \Carbon\Carbon
     */
    public $date;

    /**
     * @var string
     */
    public $format;

    /**
     * @var bool
     */
    public $human;

    /**
     * @param \DateTimeInterface $date
     * @param string|null        $format
     * @param bool               $human
     */
    public function __construct(DateTimeInterface $date, ?string $format = null, bool $human = false)
    {
        $this->date = Carbon::instance($date);
        $this->format = $format ?? config('cagilo.date-format');
        $this->human = $human;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('cagilo::time');
    }
}
