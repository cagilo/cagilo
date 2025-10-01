<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Components;

use Cagilo\UI\Tests\ComponentTestCase;
use Carbon\Carbon;

class TimeTest extends ComponentTestCase
{
    /**
     * @var \Carbon\Carbon
     */
    protected $date;

    protected function setUp(): void
    {
        parent::setUp();

        $this->date = new Carbon('2021-10-23 04:00:00', 'UTC');
    }

    public function testRenderComponent(): void
    {
        $this->blade('<x-time :date="$date"/>', [
            'date' => $this->date,
        ])
            ->assertSee('datetime="2021-10-23T04:00:00.000000Z"', false);
    }

    public function testRenderFormatComponent(): void
    {
        $this->blade('<x-time :date="$date" format="D, d M Y H:i:s O"/>', [
            'date' => $this->date,
        ])
            ->assertSee($this->date->format('D, d M Y H:i:s O'))
            ->assertSee($this->date->toISOString());
    }

    public function testRenderHumanComponent(): void
    {
        $this->blade('<x-time :date="$date" format="Y-m-d H:i:s" human/>', [
            'date' => $this->date,
        ])
            ->assertSee($this->date->diffForHumans())
            ->assertDontSee($this->date->format('Y-m-d H:i:s'))
            ->assertSee($this->date->toISOString());
    }
}
