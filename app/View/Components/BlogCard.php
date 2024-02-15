<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogCard extends Component
{
    public $title;
    public $imageUrl;
    public $author;
    public $url;
    public $category;
    public $status;
    public $id;


    public function __construct($title, $imageUrl, $author, $url,$category , $status , $id )
    {
        $this->title = $title;
        $this->imageUrl = $imageUrl;
        $this->author = $author;
        $this->url = $url;
        $this->category = $category;
        $this->status = $status;
        $this->id = $id;
    }

    public function render()
    {
       
        return view('components.blog-card');
    }
}
