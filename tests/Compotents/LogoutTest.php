<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Tests\ComponentTestCase;
use Illuminate\Support\Facades\Route;

class LogoutTest extends ComponentTestCase
{
    public function testRenderComponent(): void
    {
        Route::post('logout', fn () => '')->name('logout');
        $this->setUpApplicationRoutes();

        $this
            ->blade('<x-logout />')
            ->assertSee('Log out')
            ->assertStringContains('<form method="POST" action="http://localhost/logout"')
            ->assertStringContains('<input type="hidden" name="_token" value="">')
            ->assertStringContains('<button form="logout" type="submit');
    }

    public function testRenderWithAttributes(): void
    {
        $this
            ->blade('<x-logout action="http://example.com" class="text-muted">Sign Out</x-logout>')
            ->assertSee('Sign Out')
            ->assertStringContains('<form method="POST" action="http://example.com"')
            ->assertStringContains('<input type="hidden" name="_token" value="">')
            ->assertStringContains('<button form="logout" type="submit" class="text-muted">');
    }

    public function testRenderWithFormIdAttributes(): void
    {
        $this
            ->blade('<x-logout action="http://example.com" formId="sign-out">Sign Out</x-logout>')
            ->assertSee('Sign Out')
            ->assertStringContains('id="sign-out"')
            ->assertStringContains('<button form="sign-out"');
    }
}
