<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Traits\WithEditSessions;
use Livewire\Component;
use App\Traits\WithListItem;

class ManageEmployees extends Component
{
    use WithListItem;
    use WithEditSessions;

    public function mount()
    {

        $this->DBMODEL = Employee::class;

        $this->setListFilter([
            'employee_sid' => null,
            'name' => null,
            'department' => null,
            'role' => null,
            'phone' => null,
        ]);

        $this->pushSessionPath('manage-employees',__("ManageEmployees"),route('frame',[ 'frame' =>'manage-employees']) ,true);
    }

    public function render()
    {
        return view('livewire.manage-employees',[
            'data' => $this->readItems(),
        ]);
    }
}
