<?php

namespace App\View\Components;

use App\View\Components\EditBase;

use Illuminate\Support\Facades\Log;

class Uploader extends EditBase
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label=null)
    {
        Log::debug('in UploadFile');
        parent::__construct($name,$label);
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.uploader');
    }
}
