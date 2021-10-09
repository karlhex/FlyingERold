<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppListItems extends Component
{
    public $items;
    public $headers;
    public $filters=null;
    public $columns;
    public $url;
    public $urlcolumn;
    public $editable = true;
    public $deletable = true;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($items,$headers,$filters=null,$columns,$url=null,$urlcolumn=null,$editable=null,$deletable=null)
    {
        $this->items = $items;
        $this->headers = explode(' ',$headers);
        if ($filters)
            $this->filters = explode(' ',$filters);
        $this->columns = explode(' ',$columns);

        $this->url = $url;
        $this->urlcolumn = $urlcolumn;
        if ($editable == 'false')
            $this->editable = false;
        if ($deletable == 'false')
            $this->deletable = false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app-list-items');
    }
}
