<?php

namespace App\Http\Livewire;

use App\Models\Reimbursement;
use App\Traits\WithEditSessions;
use Livewire\Component;
use App\Traits\WithListItem;
use Illuminate\Support\Facades\Log;

class ManageReimbursement extends Component
{
    use WithListItem;
    use WithEditSessions;

    public function mount()
    {

        $this->DBMODEL = Reimbursement::class;

        $this->setListFilter([
            'apply_user' => null,
            'apply_date' => null,
            'aprove_user' => null,
            'aprove_date' => null,
            'total_amount' => null,
            'status' => null,
        ]);

        $this->pushSessionPath('manage-reimbursement',__("ManageReimbursement"),route('frame',[ 'frame' =>'manage-reimbursement']),true );
    }

    public function render()
    {
        return view('livewire.manage-reimbursement',[
            'data' => $this->readItems(),
        ]);
    }
}
