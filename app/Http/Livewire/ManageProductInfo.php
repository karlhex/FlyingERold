<?php

namespace App\Http\Livewire;

use App\Models\ProductInfo;
use App\Traits\WithEditSessions;
use Livewire\Component;
use App\Traits\WithListItem;

class ManageProductInfo extends Component
{

    use WithListItem;
    use WithEditSessions;

    protected $rules = [
        'li_record.name' => 'required|min:4',
        'li_record.company_name' => 'required|max:60',
        'li_record.type' => 'required',
    ];

    public function mount()
    {
        $this->DBMODEL = ProductInfo::class;

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
        'company_name' => null,
        'unit'  => null,
        'type'  => null,
        ]);

        $this->pushSessionPath('manage-product-info',__("ManageProductInfo"),route('frame',[ 'frame' =>'manage-product-info']) ,true);
    }

    public function render()
    {
        return view('livewire.manage-product-info',[
            'data' => $this->readItems(),
        ]);
    }
}
