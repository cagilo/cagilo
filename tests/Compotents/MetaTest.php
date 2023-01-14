<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Compotents;

use Cagilo\UI\Tests\ComponentTestCase;
use Illuminate\Support\Facades\Blade;

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

    public function testForNonEncodeElement(): void
    {
        $template = <<<'HTML'
            <x-meta
                title="Hands&Feet"
                description='"/> <script>alert(1)</script>`/>'
            />
            HTML;

        $this
            ->blade($template)
            ->assertSee('<title>Hands&Feet</title>', false)
            ->assertSee('"/> <script>alert(1)</script>', false);
    }

    public function testEncodeElement(): void
    {
        $template = <<<'HTML'
            <x-meta
                title="Hands&Feet"
                description='"/> <script>alert(1)</script>`/>'
                :escape="true"
            />
            HTML;

        $this
            ->blade($template)
            ->assertStringContains('Hands&amp;Feet')
            ->assertStringContains('&quot;/&gt; &lt;script&gt;alert(1)&lt;/script&gt;`/&gt;');
    }
}
