<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $title;
    public $link;

    public function __construct($title, $link)
    {
        $this->title = $title;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.button');
    }
}
