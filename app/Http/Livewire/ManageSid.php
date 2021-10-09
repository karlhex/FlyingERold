<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SidConfig;
use App\Traits\WithEditSessions;
use App\Traits\WithListItem;

class ManageSid extends Component
{

    use WithListItem;
    use WithEditSessions;

    protected $rules = [
        'li_record.key' => 'required|min:2',
        'li_record.length' => 'required|numeric|max:20',
    ];

    public function mount()
    {
        $this->DBMODEL = SidConfig::class;

        $this->setListItem([
        'id'   => 0,
        'key' => null,
        'prefix' => null,
        'inc_year' => false,
        'inc_month' => false,
        'inc_day'  => false,
        'length' => null,
        'current_no' => null,
        'max_no'  => null,
        'clear_interval'  => 'never',
        ]);

        $this->setListFilter([
            'key' => null,
            'prefix' => null,
            'current_no' => null,
            'clear_interval' => null,
        ]);
        $this->pushSessionPath('manage-sid',__("ManageSid"),route('frame',[ 'frame' =>'manage-sid']) ,true);
    }

    public function render()
    {
        return view('livewire.manage-sid',[
            'data' => $this->readItems(),
        ]);
    }
}
