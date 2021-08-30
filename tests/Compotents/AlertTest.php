<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Tests\ComponentTestCase;

class AlertTest extends ComponentTestCase
{
    public function testShowMessage(): void
    {
        session()->flash('alert', 'Form was successfully submitted.');

        $this
            ->blade('<x-alert/>')
            ->assertSee('Form was successfully submitted.')
            ->assertStringContains('role="alert"');
    }

    public function testSpecifyType(): void
    {
        session()->flash('error', 'Form contains some errors.');

        $this
            ->blade('<x-alert type="error"/>')
            ->assertSee('Form contains some errors.')
            ->assertStringContains('role="alert"');
    }

    public function testSlotted(): void
    {
        session()->flash('alert', 'Form was successfully submitted.');

        $template = <<<'HTML'
            <x-alert>
                <span>Hello World</span>
                {{ $component->message() }}
            </x-alert>
        HTML;

        $this
            ->blade($template)
            ->assertSee('Hello World')
            ->assertSee('Form was successfully submitted.')
            ->assertStringContains('role="alert"');
    }

    public function testMultipleMessage(): void
    {
        $message = tap([
            'Form was successfully submitted.',
            'We have sent you a confirmation email.',
        ], fn($message) => session()->flash('alert', $message));

        $template = <<<'HTML'
            <x-alert>
                <span>Hello World</span>
                {{ implode(' ', $component->messages()) }}
            </x-alert>
        HTML;

        $this
            ->blade($template)
            ->assertSee('Hello World')
            ->assertSeeInOrder($message)
            ->assertStringContains('role="alert"');
    }
}
