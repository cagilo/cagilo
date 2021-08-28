<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Avatar extends Component
{
    public string $text;
    public bool $round;
    public int $size;
    public string $bgColor;
    public string $textColor;
    public string $fontFamily;
    public float $fontSize;
    public string $fontWeight;

    /**
     * @param string $text
     * @param bool   $round
     * @param int    $size
     * @param string $bgColor
     * @param string $textColor
     * @param string $fontFamily
     * @param float  $fontSize
     * @param string $fontWeight
     */
    public function __construct(
        string $text = 'AB',
        bool   $round = true,
        int    $size = 64,
        string $bgColor = '#ff0000',
        string $textColor = '#ffffff',
        string $fontFamily = "inherit",
        float  $fontSize = 0.4,
        string $fontWeight = 'normal'
    )
    {
        $this->text = $text;
        $this->round = $round;
        $this->size = $size;
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
        $this->fontFamily = $fontFamily;
        $this->fontSize = $fontSize;
        $this->fontWeight = $fontWeight;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('');
    }
}
