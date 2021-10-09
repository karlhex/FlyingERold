<?php

namespace App\View\Components;

use App\Models\Company;
use Illuminate\Support\Facades\Log;
use App\View\Components\SelectBase;

class SelectCompany extends SelectBase
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label=null,$caption=null)
    {
        Log::debug('in select person');
        $company = $this->loadCompany();
        parent::__construct($name,$label,$caption,$company);
    }

    protected function loadCompany(){
        $data = Company::all();

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-company');
    }
}
