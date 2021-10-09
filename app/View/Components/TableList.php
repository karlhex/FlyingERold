<?php

namespace App\View\Components;

use App\View\Components\EditBase;

class TableList extends EditBase
{
    public $items=null;
    public $columns;
    public $headers;
    public $editable=true;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$headers,$columns,$label=null,$items=null,$editable=true)
    {
        parent::__construct($name,$label);
       $this->items = $items;
       $this->columns = explode(' ',$columns);
       $this->headers = explode(' ',$headers);
       $this->editable = $editable;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-list');
    }
}
