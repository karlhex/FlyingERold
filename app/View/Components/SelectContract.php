<?php

namespace App\View\Components;

use App\Models\Contract;
use Illuminate\Support\Facades\Log;
use App\View\Components\SelectBase;

class SelectContract extends SelectBase
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label=null,$caption=null)
    {
        Log::debug('in select employee');
        $data = $this->loadContracts();
        parent::__construct($name,$label,$caption,$data);
    }

    protected function loadContracts(){
        $data = Contract::all();

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-contract');
    }
}
