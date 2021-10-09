<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use App\Traits\WithEditSessions;
use App\Traits\WithListItem;
use Illuminate\Support\Facades\Log;

class ManagePeople extends Component
{
    use WithListItem;
    use WithEditSessions;

    protected $rules = [
        'li_record.name' => 'required|min:2',
        'li_record.phone1' => 'required|numeric',
        'li_record.email' => 'required|email',
    ];

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
        $this->pushSessionPath('manage-people',__("ManagePeople"),route('frame',[ 'frame' =>'manage-people']) ,true);
    }

    public function render()
    {
        return view('livewire.manage-people',[
            'data' => $this->readItems(),
        ]);
    }
}
