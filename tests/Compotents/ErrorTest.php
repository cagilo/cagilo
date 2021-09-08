<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Tests\ComponentTestCase;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class ErrorTest extends ComponentTestCase
{
    /**
     * Populate the shared view error bag with the given errors.
     *
     * @param array  $errors
     * @param string $key
     *
     * @return self
     */
    private function withViewErrors(array $errors, string $key = 'default'): self
    {
        View::share('errors', (new ViewErrorBag())->put($key, new MessageBag($errors)));

        return $this;
    }

    public function testComponentRendered(): void
    {
        $this
            ->withViewErrors(['first_name' => 'Incorrect first name.'])
            ->blade('<x-error field="first_name" class="text-danger"/>')
            ->assertStringContains('class="text-danger"')
            ->assertStringContains('Incorrect first name.');
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
            ->assertStringContains('<li>Incorrect first name.</li>')
            ->assertStringContains(' <li>Needs at least 5 characters.</li>');
    }
}
