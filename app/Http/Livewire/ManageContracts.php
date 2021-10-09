<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use App\Traits\WithEditSessions;
use Livewire\Component;
use App\Traits\WithListItem;
use Illuminate\Support\Facades\Log;

class ManageContracts extends Component
{
    use WithListItem;
    use WithEditSessions;

    public $filter=[
        'amount_low' => 0,
        'amount_high' => 99999999.99,
        'start_date'  => null,
        'end_date'    => null,
        'type'        => 'sales',
    ];

    public $enableFilter = false;

    public function mount()
    {

        $this->DBMODEL = Contract::class;

        $this->setListFilter([
            'sid' => null,
            'title' => null,
            'amount' => null,
            'sign_date' => null,
            'stage' => null,
            'company' => null,
        ]);

        $this->filter['start_date'] = date('Y-m-d',strtotime('-1 years'));
        $this->filter['end_date'] = date('Y-m-d');
        $this->pushSessionPath('manage-contracts',__("ManageContracts"),route('frame',[ 'frame' =>'manage-contracts']) ,true);
    }

    public function readItems()
    {
        $obj =  $this->DBMODEL::filter($this->li_filters);

        if ($this->enableFilter)
            $obj = $obj->where('amount', '>=' ,$this->filter['amount_low'])
                    ->where('amount', '<=' ,$this->filter['amount_high'])
                    ->where('sign_date', '>=' ,$this->filter['start_date'])
                    ->where('sign_date', '<=' ,$this->filter['end_date'])
                    ->where('type', $this->filter['type']);

        return $obj->paginate($this->linesPerPage);
    }

    public function render()
    {
        return view('livewire.manage-contracts',[
            'data' => $this->readItems(),
        ]);
    }
}
