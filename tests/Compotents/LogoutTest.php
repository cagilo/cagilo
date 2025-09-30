<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

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

    public function test_render_component(): void
    {
        $this
            ->blade('<x-logout />')
            ->assertSee('Log out')
            ->assertStringContains('<form method="POST" action="http://localhost/logout"')
            ->assertStringContains('<input type="hidden" name="_token" value=""')
            ->assertStringContains('<button form="logout" type="submit');
    }

    public function test_render_with_attributes(): void
    {
        $this
            ->blade('<x-logout action="http://example.com" class="text-muted">Sign Out</x-logout>')
            ->assertSee('Sign Out')
            ->assertStringContains('<form method="POST" action="http://example.com"')
            ->assertStringContains('<input type="hidden" name="_token" value=""')
            ->assertStringContains('<button form="logout" type="submit" class="text-muted">');
    }

    public function test_render_with_form_id_attributes(): void
    {
        $this
            ->blade('<x-logout action="http://example.com" formId="sign-out">Sign Out</x-logout>')
            ->assertSee('Sign Out')
            ->assertStringContains('id="sign-out"')
            ->assertStringContains('<button form="sign-out"');
    }
}
