<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use App\Traits\WithListItem;

class ManageCompany extends Component
{

    use WithListItem;

    public function mount()
    {
        $this->DBMODEL = Company::class;

        $this->setListItem([
        'id'   => 0,
        'name' => null,
        'address' => null,
        'email'  => null,
        'phone'  => null,
        'site' => null,
        'business_person'  => null,
        'tech_person'  => null,
        ]);

        $this->setListFilter([
        'name' => null,
        'address' => null,
        'email'  => null,
        'phone'  => null,
        'site' => null,
        ]);
    }

    public function render()
    {
        return view('livewire.manage-company',[
            'data' => $this->readItems(),
        ]);
    }
}
