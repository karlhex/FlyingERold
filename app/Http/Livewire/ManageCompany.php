<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Traits\WithEditSessions;
use Livewire\Component;
use App\Traits\WithListItem;

class ManageCompany extends Component
{
    use WithListItem;
    use WithEditSessions;

    protected $rules = [
        'li_record.name' => 'required|min:4',
        'li_record.address' => 'required|max:60',
        'li_record.email' => 'required|email',
    ];

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
        $this->pushSessionPath('manage-company',__("ManageCompany"),route('frame',[ 'frame' =>'manage-company']) ,true);
    }

    public function render()
    {
        return view('livewire.manage-company',[
            'data' => $this->readItems(),
        ]);
    }
}
