<?php

declare(strict_types=1);

namespace Cagilo\UI\Tests;

use Illuminate\Testing\Assert;
use Illuminate\Testing\Constraints\SeeInOrder;
use Illuminate\View\View;


class TestView
{
    /**
     * The original view.
     *
     * @var \Illuminate\View\View
     */
    protected $view;

    /**
     * The rendered view contents.
     *
     * @var string
     */
    protected $rendered;

    /**
     * Create a new test view instance.
     *
     * @param \Illuminate\View\View $view
     *
     * @return void
     * @throws \Throwable
     */
    public function __construct(View $view)
    {
        $this->view = $view;
        $this->rendered = $view->render();
    }

    /**
     * Assert that the given string is contained within the view.
     *
     * @param string $value
     * @param bool   $escaped
     *
     * @return $this
     */
    public function assertSee(string $value, bool $escaped = true)
    {
        $value = $escaped ? e($value) : $value;

        Assert::assertStringContainsString($value, $this->rendered);

        return $this;
    }

    /**
     * Assert that the given strings are contained in order within the view.
     *
     * @param array $values
     * @param bool  $escape
     *
     * @return $this
     */
    public function assertSeeInOrder(array $values, bool $escape = true)
    {
        $values = $escape ? array_map('e', ($values)) : $values;

        Assert::assertThat($values, new SeeInOrder($this->rendered));

        return $this;
    }

    /**
     * Assert that the given string is contained within the view text.
     *
     * @param string $value
     * @param bool   $escape
     *
     * @return $this
     */
    public function assertSeeText(string $value, bool $escape = true)
    {
        $value = $escape ? e($value) : $value;

        Assert::assertStringContainsString($value, strip_tags($this->rendered));

        return $this;
    }

    /**
     * Assert that the given strings are contained in order within the view text.
     *
     * @param array $values
     * @param bool  $escape
     *
     * @return $this
     */
    public function assertSeeTextInOrder(array $values, bool $escape = true)
    {
        $values = $escape ? array_map('e', ($values)) : $values;

        Assert::assertThat($values, new SeeInOrder(strip_tags($this->rendered)));

        return $this;
    }

    /**
     * Assert that the given string is not contained within the view.
     *
     * @param string $value
     * @param bool   $escape
     *
     * @return $this
     */
    public function assertDontSee(string $value, bool $escape = true)
    {
        $value = $escape ? e($value) : $value;

        Assert::assertStringNotContainsString($value, $this->rendered);

        return $this;
    }

    /**
     * Assert that the given string is not contained within the view text.
     *
     * @param string $value
     * @param bool   $escape
     *
     * @return $this
     */
    public function assertDontSeeText(string $value, bool $escape = true)
    {
        $value = $escape ? e($value) : $value;

        Assert::assertStringNotContainsString($value, strip_tags($this->rendered));

        return $this;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function assertStringContains(string $value): static
    {
        Assert::assertStringContainsString($value, $this->rendered);

        return $this;
    }


    /**
     * @param string $value
     *
     * @return $this
     */
    public function assertStringNotContains(string $value): static
    {
        Assert::assertStringNotContainsString($value, $this->rendered);

        return $this;
    }


    /**
     * Get the string contents of the rendered view.
     *
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->rendered;
    }
}
