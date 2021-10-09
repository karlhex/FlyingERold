<?php

namespace App\View\Components;

use App\View\Components\MenuItem;

class SubMenuItem extends MenuItem
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route,$itemname,$counter=null)
    {
        parent::__construct($route,$itemname,$counter);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sub-menu-item');
    }
}
