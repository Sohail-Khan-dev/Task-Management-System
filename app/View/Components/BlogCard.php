<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogCard extends Component
{
    public $title;
    public $imageUrl;
    public $readTime;
    public $url;

    public function __construct($title, $imageUrl, $readTime, $url)
    {
        $this->title = $title;
        $this->imageUrl = $imageUrl;
        $this->readTime = $readTime;
        $this->url = $url;
    }

    public function render()
    {
        return view('components.blog-card');
    }
}
