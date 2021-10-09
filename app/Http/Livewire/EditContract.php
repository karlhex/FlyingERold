<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;
use App\Traits\WithFilesListControl;
use Livewire\Component;
use App\Traits\WithMultiListControl;
use App\Traits\WithSid;
use Illuminate\Support\Facades\Log;
use App\Rules\asum;

class EditContract extends Component
{
    use WithMultiListControl;
    use WithSid;
    use WithFilesListControl;
    use WithEditPage;
    use WithEditSessions;


    public $isum;

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(Contract::class);

        $this->setEditSessionName('fwcontract');

        if ($xid == 0 && session()->exists('fwcontract'))
        {
            $this->restoreEditSession();
            $cur_record = $this->restoreSubEditSession();

            $this->rtnMultiListItemOne($cur_record);

        }
        else
        {
            $this->pushSessionPath('edit-contract',__("EditContract"), route('dialog',['dialog'=> 'edit-contract','id' => 0]));

            $this->getEditPageData($xid ,
                                   [
                                       "id" => null,
                                       "project_id" => null,
                                       "sid" => null,
                                       "peer_sid" => null,
                                       "title" => null,
                                       "company_id" => null,
                                       "type" => 'purchase',
                                       "amount" => null,
                                       "stage" => 'waiting',
                                       "sign_date" => null,
                                       "start_date" => null,
                                       "end_date" => null,
                                       "contact_person" => null,
                                   ]
                                  );

            $this->setMultiListItemFromModel($this->editPageRec,
                                             'products',
                                [
                                    'id' =>0,
                                    'productinfo_id' => null,
                                    'unit_price' => null,
                                    'number' => null,
                                    'status' => 'factory',
                                ],
                                [ 'product_name'],
                                    'sub-edit-product',
                                    true
            );

            $this->setMultiListItemFromModel($this->editPageRec,
                                         'sops',
                                [
                                    'id' => null,
                                    'contract_id' => null,
                                    'sequence'=> null,
                                    'drcr' => 'Dr',
                                    'instruction' => null,
                                    'amount' => null,
                                    'schedule_date' => null,
                                    'tran_date' => null,
                                    'memo' => null,
                                ],
                                ['drcr_name'],
                                'sub-edit-sop',
                                true);

            $this->setFilesListItemFromModel($this->editPageRec,
                                         [
                                             'id' => 0,
                                             'name' => null,
                                             'origin_name' => null,
                                             'file' => null,
                                             'type' => 'doc',
                                             'thumbnail' => null,
                                         ]
                                        );
        }

    }

    public function getContracts()
    {
        if ($this->editPageRec == null)
            return null;

        $prod = $this->editPageRec->contracts;

        $records = [];

        foreach ($prod as $item)
        {
            $rec = $item->toArray();

            array_push($records,$rec);
        }

        return $records;
    }

    public function save(){

        $this->validate([
        'edit_page_data.data.sid' => 'required',
        'edit_page_data.data.title' => 'required',
        'edit_page_data.data.company_id'    => 'required',
        'edit_page_data.data.type'    => 'required',
        'edit_page_data.data.amount'    => ['required',new asum($this->mlm_record,'sops','amount')],
        'edit_page_data.data.stage'    => 'required',
        'edit_page_data.data.sign_date'    => 'required|date',
        'edit_page_data.data.start_date'    => 'required|date',
        'edit_page_data.data.end_date'    => 'required|date',
        'edit_page_data.data.contact_person'    => 'required',

        ]);

        $this->saveEditPage();

        $this->returnToParent();
    }

    public function delete()
    {
        $id = $this->edit_page_data['data']['id'];

        if ($id <= 0)
            $this->returnToParent();
        else
        {
            $this->removeEditPage();

            $this->returnToParent();
        }

    }

    public function render()
    {
        return view('livewire.edit-contract'
        );
    }
}
