<?php

namespace App\View\Components;

use App\View\Components\TableList;

class FilesList extends TableList
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label=null,$items=null)
    {
        $columns = 'name origin_name';
        $headers = __('files.name').' '.__('files.file');

        parent::__construct($name,$headers,$columns,$label,$items);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.files-list');
    }
}
