<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Tests\ComponentTestCase;

class SubmitTest extends ComponentTestCase
{
    /**
     * Define web routes setup.
     *
     * @api
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    protected function defineWebRoutes($router)
    {
        $router->post('subscribe', fn () => '')->name('subscribe');
    }

    public function testRenderComponent(): void
    {
        $this
            ->blade('<x-submit action="anyString"/>')
            ->assertSee('Submit')
            ->assertStringContains('<form method="POST" action="anyString"')
            ->assertStringContains('<input type="hidden" name="_token" value=""')
            ->assertStringContains('type="submit');
    }

    public function testRenderWithAttributes(): void
    {
        $this
            ->blade('<x-submit action="http://example.com" class="text-muted">Sign Out</x-submit>')
            ->assertSee('Sign Out')
            ->assertStringContains('<form method="POST" action="http://example.com"')
            ->assertStringContains('<input type="hidden" name="_token" value=""')
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
        $this
            ->blade('<x-submit action="subscribe"/>')
            ->assertStringContains('<form method="POST" action="http://localhost/subscribe"');
    }
}
