<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests\Components;

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
                csp="example.com example.edu"
            />
            HTML;

        $this
            ->blade($template)
            ->assertSee('<title>Hello World</title>', false)
            ->assertSee('<meta name="title" content="Hello World">', false)
            ->assertSee('<meta name="description" content="Blade components are awesome!">', false)
            ->assertSee('<meta name="keywords" content="tags, tags, tags">', false)
            ->assertSee('<meta name="author" content="Alexander">', false)
            ->assertSee('<meta name="robots" content="noindex">', false)
            ->assertSee('<meta property="og:type" content="website">', false)
            ->assertSee('<meta property="og:url" content="http://localhost"/>', false)
            ->assertSee('<meta property="og:locale" content="en"/>', false)
            ->assertSee('<meta property="og:title" content="Hello World"/>', false)
            ->assertSee('<meta property="og:description" content="Blade components are awesome!">', false)
            ->assertSee('<meta property="og:image" content="http://example.com/social.jpg">', false)
            ->assertSee('<meta name="twitter:card" content="summary"/>', false)
            ->assertSee('<meta name="twitter:url" content="http://localhost">', false)
            ->assertSee('<meta name="twitter:title" content="Hello World">', false)
            ->assertSee('<meta name="twitter:description" content="Blade components are awesome!">', false)
            ->assertSee('<meta name="twitter:image" content="http://example.com/social.jpg">', false)
            ->assertSee('<meta http-equiv="Content-Security-Policy" content="default-src \'self\' data: \'unsafe-inline\' \'unsafe-hashes\' \'unsafe-eval\' example.com example.edu">', false);
    }

    public function testForNotDisplayingOptionalElements(): void
    {
        $this
            ->blade(' <x-meta title="Hello World"  />')
            ->assertSee('<title>Hello World</title>', false)
            ->assertDontSee('<meta name="author" content="">', false)
            ->assertDontSee('<meta name="robots" content="">', false)
            ->assertDontSee('<meta http-equiv="Content-Security-Policy" content="default-src \'self\' data: \'unsafe-inline\' \'unsafe-hashes\' \'unsafe-eval\'">', false);
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
            ->assertSee('Hands&amp;Feet', false)
            ->assertSee('&quot;/&gt; &lt;script&gt;alert(1)&lt;/script&gt;`/&gt;', false);
    }
}
