<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use App\Traits\WithListItem;

class ManageEmployees extends Component
{
    use WithListItem;

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

    }

    public function render()
    {
        return view('livewire.manage-employees',[
            'data' => $this->readItems(),
        ]);
    }
}
