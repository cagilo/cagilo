<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Tests\ComponentTestCase;

class MetaTest extends ComponentTestCase
{
    public function testRender(): void
    {
        $template = <<<'HTML'
            <x-meta
                title="Hello World"
                description="Blade components are awesome!"
                keywords="tags, tags, tags"
                author="Alexander"
                robots="noindex"
                card="summary"
                image="http://example.com/social.jpg"
            />
            HTML;

        $this
            ->blade($template)
            ->assertStringContains('<title>Hello World</title>')
            ->assertStringContains('<meta name="title" content="Hello World">')
            ->assertStringContains('<meta name="description" content="Blade components are awesome!">')
            ->assertStringContains('<meta name="keywords" content="tags, tags, tags">')
            ->assertStringContains('<meta name="author" content="Alexander">')
            ->assertStringContains('<meta name="robots" content="noindex">')
            ->assertStringContains('<meta property="og:type" content="website">')
            ->assertStringContains('<meta property="og:url" content="http://localhost"/>')
            ->assertStringContains('<meta property="og:locale" content="en"/>')
            ->assertStringContains('<meta property="og:title" content="Hello World"/>')
            ->assertStringContains('<meta property="og:description" content="Blade components are awesome!">')
            ->assertStringContains('<meta property="og:image" content="http://example.com/social.jpg">')
            ->assertStringContains('<meta name="twitter:card" content="summary"/>')
            ->assertStringContains('<meta name="twitter:url" content="http://localhost">')
            ->assertStringContains('<meta name="twitter:title" content="Hello World">')
            ->assertStringContains('<meta name="twitter:description" content="Blade components are awesome!">')
            ->assertStringContains('<meta name="twitter:image" content="http://example.com/social.jpg">');
    }

    public function testForNotDisplayingOptionalElements(): void
    {
        $this
            ->blade(' <x-meta title="Hello World"  />')
            ->assertStringContains('<title>Hello World</title>')
            ->assertStringNotContains('<meta name="author" content="">')
            ->assertStringNotContains('<meta name="robots" content="">');
    }
}
