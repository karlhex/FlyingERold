<?php

namespace App\View\Components;

use App\View\Components\LabelInput;

class TableSelect extends LabelInput
{
    public $item;
    public $columns;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$columns,$label=null,$item=null)
    {
        parent::__construct($name,$label);
       $this->item = $item;
       $this->columns = explode(' ',$columns);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-select');
    }
}
