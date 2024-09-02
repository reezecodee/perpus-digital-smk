<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BorrowerLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $bubble;
    public function __construct($title = '', $bubble = true)
    {
        $this->title = $title;
        $this->bubble = $bubble;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.borrower');
    }
}
