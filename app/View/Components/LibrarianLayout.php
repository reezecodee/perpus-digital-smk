<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LibrarianLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $heading;
    
    public function __construct($title = '', $heading = '')
    {
        $this->title = $title;
        $this->heading = $heading;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.librarian');
    }
}
