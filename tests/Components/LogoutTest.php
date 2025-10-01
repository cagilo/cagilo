<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Components;

use Cagilo\UI\Tests\ComponentTestCase;

class LogoutTest extends ComponentTestCase
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
        $router->post('logout', fn () => '')->name('logout');
    }

    public function testRenderComponent(): void
    {
        $this
            ->blade('<x-logout />')
            ->assertSee('Log out')
            ->assertSee('<form method="POST" action="http://localhost/logout"', false)
            ->assertSee('<input type="hidden" name="_token" value=""', false)
            ->assertSee('<button form="logout" type="submit', false);
    }

    public function testRenderWithAttributes(): void
    {
        $this
            ->blade('<x-logout action="http://example.com" class="text-muted">Sign Out</x-logout>')
            ->assertSee('Sign Out')
            ->assertSee('<form method="POST" action="http://example.com"', false)
            ->assertSee('<input type="hidden" name="_token" value=""', false)
            ->assertSee('<button form="logout" type="submit" class="text-muted">', false);
    }

    public function testRenderWithFormIdAttributes(): void
    {
        $this
            ->blade('<x-logout action="http://example.com" formId="sign-out">Sign Out</x-logout>')
            ->assertSee('Sign Out')
            ->assertSee('id="sign-out"', false)
            ->assertSee('<button form="sign-out"', false);
    }
}
