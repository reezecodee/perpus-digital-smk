<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OfficerLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $pageTitle;
    public $name;
    public $type;
    public $btnName;
    public $url;

    public function __construct($title = '', $pageTitle = '', $name = 'Overview', $type = '', $btnName = '', $url = '')
    {
        $this->title = $title;
        $this->pageTitle = $pageTitle;
        $this->name = $name;
        $this->type = $type;
        $this->btnName = $btnName;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.officer');
    }
}
