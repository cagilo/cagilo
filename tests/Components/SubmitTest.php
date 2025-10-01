<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Components;

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
            ->assertSee('<form method="POST" action="anyString"', false)
            ->assertSee('<input type="hidden" name="_token" value=""', false)
            ->assertSee('type="submit', false);
    }

    public function testRenderWithAttributes(): void
    {
        $this
            ->blade('<x-submit action="http://example.com" class="text-muted">Sign Out</x-submit>')
            ->assertSee('Sign Out')
            ->assertSee('<form method="POST" action="http://example.com"', false)
            ->assertSee('<input type="hidden" name="_token" value=""', false)
            ->assertSee('type="submit" class="text-muted">', false);
    }

    public function testRenderWithFormIdAttributes(): void
    {
        $this
            ->blade('<x-submit action="http://example.com" formId="sign-out">Sign Out</x-submit>')
            ->assertSee('Sign Out')
            ->assertSee('id="sign-out"', false)
            ->assertSee('<button form="sign-out"', false);
    }

    public function testRenderWithRouteNameComponent(): void
    {
        $this
            ->blade('<x-submit action="subscribe"/>')
            ->assertSee('<form method="POST" action="http://localhost/subscribe"', false);
    }

    public function testRenderForCustomMethodComponent(): void
    {
        $this
            ->blade('<x-submit action="subscribe" method="DELETE"/>')
            ->assertSee('<form method="POST" action="http://localhost/subscribe"', false)
            ->assertSee('<input type="hidden" name="_method" value="DELETE">', false);
    }
}
