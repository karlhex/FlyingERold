<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use App\Traits\WithListItem;
use Illuminate\Support\Facades\Log;

class ManagePeople extends Component
{

    use WithListItem;

    public function mount()
    {
        $this->DBMODEL = Person::class;

        $this->setListItem([
        'id'   => 0,
        'name' => null,
        'phone1' => null,
        'phone2' => null,
        'phone3' => null,
        'email'  => null,
        'company_name' => null,
        'department' => null,
        'position'  => null,
        ]);

        $this->setListFilter([
            'name' => null,
            'company_name' => null,
            'department' => null,
            'position' => null,
            'phone' => null,
            'email' => null,
        ]);
    }

    public function render()
    {
        return view('livewire.manage-people',[
            'data' => $this->readItems(),
        ]);
    }
}
