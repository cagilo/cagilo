<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Tests\ComponentTestCase;
use Illuminate\Support\Facades\Route;

class SubmitTest extends ComponentTestCase
{
    public function testRenderComponent(): void
    {
        Route::post('logout', fn () => '')->name('logout');
        $this->setUpApplicationRoutes();

        $this
            ->blade('<x-submit action="subscribe"/>')
            ->assertSee('Submit')
            ->assertStringContains('<form method="POST" action="subscribe"')
            ->assertStringContains('<input type="hidden" name="_token" value="">')
            ->assertStringContains('type="submit');
    }

    public function testRenderWithAttributes(): void
    {
        $this
            ->blade('<x-submit action="http://example.com" class="text-muted">Sign Out</x-submit>')
            ->assertSee('Sign Out')
            ->assertStringContains('<form method="POST" action="http://example.com"')
            ->assertStringContains('<input type="hidden" name="_token" value="">')
            ->assertStringContains('type="submit" class="text-muted">');
    }

    public function testRenderWithFormIdAttributes(): void
    {
        $this
            ->blade('<x-submit action="http://example.com" formId="sign-out">Sign Out</x-submit>')
            ->assertSee('Sign Out')
            ->assertStringContains('id="sign-out"')
            ->assertStringContains('<button form="sign-out"');
    }

    public function testRenderWithRouteNameComponent(): void
    {
        Route::post('subscribe', fn () => '')->name('subscribe');
        $this->setUpApplicationRoutes();

        $this
            ->blade('<x-submit action="subscribe"/>')
            ->assertStringContains('<form method="POST" action="http://localhost/subscribe"');
    }
}
