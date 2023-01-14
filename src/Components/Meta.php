<?php

declare(strict_types=1);

namespace Cagilo\UI\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
{
    public $title;
    public $description;
    public $author;
    public $robots;
    public $keywords;
    public $type;
    public $card;
    public $image;
    public $url;

    /**
     * @param string $title
     * @param string $description
     * @param string $keywords
     * @param string $author
     * @param string $robots
     * @param string $type
     * @param string $card
     * @param string $image
     * @param string $url
     */
    public function __construct(
        string $title = '',
        string $description = '',
        string $keywords = '',
        string $author = '',
        string $robots = '',
        string $type = 'website',
        string $card = 'summary_large_image',
        string $image = '',
        string $url = '',
        bool $escape = false
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->author = $author;
        $this->robots = $robots;
        $this->type = $type;
        $this->card = $card;
        $this->image = $image;
        $this->url = $url ?: url()->current();

        if ($escape) {
            $this->title = e($this->title);
            $this->description = e($this->description);
            $this->keywords = e($this->keywords);
            $this->author = e($this->author);
            $this->robots = e($this->robots);
            $this->type = e($this->type);
            $this->card = e($this->card);
            $this->image = e($this->image);
            $this->url = e($this->url);
        }
    }

    public function render(): View
    {
        return view('cagilo::meta');
    }
}
