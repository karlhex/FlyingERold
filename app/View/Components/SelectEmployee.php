<?php

namespace App\View\Components;

use App\Models\Employee;
use Illuminate\Support\Facades\Log;
use App\View\Components\SelectBase;

class SelectEmployee extends SelectBase
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label=null,$caption=null)
    {
        Log::debug('in select employee');
        $employees = $this->loadEmployees();
        parent::__construct($name,$label,$caption,$employees);
    }

    protected function loadEmployees(){
        $data = Employee::all();

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-employee');
    }
}
