<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $route;
    public $itemname;
    public $counter;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route,$itemname,$counter=null)
    {
        $this->route = $route;
        $this->itemname = $itemname;
        $this->counter = $counter;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
