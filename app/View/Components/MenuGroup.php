<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuGroup extends Component
{
    public $groupname;
    public $counter;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($groupname,$counter=null)
    {
        $this->groupname = $groupname;
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu-group');
    }
}
