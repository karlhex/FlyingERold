<?php

namespace App\View\Components;

use App\View\Components\EditBase;

class EditSid extends EditBase
{
    public $key;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $key,$label=null)
    {
        parent::__construct($name,$label);
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sid');
    }
}
