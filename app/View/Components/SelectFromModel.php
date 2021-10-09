<?php

namespace App\View\Components;

use App\Models\SelectOption;
use App\View\Components\SelectBase;
use Illuminate\Support\Facades\Log;

class SelectFromModel extends SelectBase
{

    public $key;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label=null,$caption=null,$key)
    {
        $this->key = $key;
        $options = SelectOption::where('key',$key)->get()->toArray();
        parent::__construct($name,$label,$caption,$options);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-from-model');
    }
}
