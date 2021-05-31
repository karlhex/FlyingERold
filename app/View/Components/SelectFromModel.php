<?php

namespace App\View\Components;

use App\Models\SelectOption;
use App\View\Components\LabelInput;
use Illuminate\Support\Facades\Log;

class SelectFromModel extends LabelInput
{

    public $key;
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label=null,$key)
    {
        Log::debug("in SelectFromModel");
        parent::__construct($name,$label);
        $this->key = $key;
        $this->options = SelectOption::where('key',$key)->get();
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
