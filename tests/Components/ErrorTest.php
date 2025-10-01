<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Components;

use Cagilo\UI\Tests\ComponentTestCase;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class ErrorTest extends ComponentTestCase
{
    public function testComponentRendered(): void
    {
        $this
            ->withViewErrors(['first_name' => 'Incorrect first name.'])
            ->blade('<x-error field="first_name" class="text-danger"/>')
            ->assertSee('class="text-danger"', false)
            ->assertSee('Incorrect first name.');
    }

    public function testSlotted(): void
    {
        $template = <<<'HTML'
            <x-error field="first_name">
                <ul>
                    @foreach ($component->messages($errors) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-error>
            HTML;

        $this
            ->withViewErrors(['first_name' => ['Incorrect first name.', 'Needs at least 5 characters.']])
            ->blade($template)
            ->assertSee('<li>Incorrect first name.</li>', false)
            ->assertSee(' <li>Needs at least 5 characters.</li>', false);
    }
}
