<?php

namespace App\Http\Livewire;

use App\Models\Reimbursement;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;
use App\Traits\WithFilesListControl;
use Livewire\Component;
use App\Traits\WithMultiListControl;
use App\Rules\asum;

class EditReimbursement extends Component
{
    use WithMultiListControl;
    use WithFilesListControl;
    use WithEditPage;
    use WithEditSessions;


    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(Reimbursement::class);

        $this->setEditSessionName('fwreimbursement');

        if ($xid == 0 && session()->exists('fwreimbursement'))
        {
            $this->restoreEditSession();
            $cur_record = $this->restoreSubEditSession();

            $this->rtnMultiListItemOne($cur_record);

        }
        else
        {
            $this->pushSessionPath('edit-reimbursement',__("EditReimbursement"), route('dialog',['dialog'=> 'edit-reimbursement','id' => 0]));

            $this->getEditPageData($xid ,
                                   [
                                       "id" => null,
                                       "apply_employee_id" => null,
                                       "apply_date" => null,
                                       "approve_employee_id" => null,
                                       "approve_date" => null,
                                       "total_amount" => null,
                                       "status" => 'applying',
                                   ]
                                  );

            $this->setMultiListItemFromModel($this->editPageRec,
                                             'detail',
                                [
                                    'id' =>0,
                                    'date' => null,
                                    'reason' => null,
                                    'amount' => null,
                                    'project_id' => null,
                                ],
                                [ 'project_name'],
                                    'sub-edit-rbdetail',
                                    true
            );

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

    public function save(){

        $this->validate([
        'edit_page_data.data.apply_employee_id' => 'required',
        'edit_page_data.data.apply_date' => 'required',
        'edit_page_data.data.total_amount'    => ['required',new asum($this->mlm_record,'detail','amount')],
        'edit_page_data.data.status'    => 'required',
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

    public function approve()
    {

        $this->edit_page_data['data']['status'] = 'approved';
        $this->edit_page_data['data']['approve_date'] = date('Y-m-d');

        return $this->save();
    }

    public function reject()
    {

        $this->edit_page_data['data']['status'] = 'rejected';
        $this->edit_page_data['data']['approve_date'] = date('Y-m-d');

        return $this->save();

    }

    public function render()
    {
        return view('livewire.edit-reimbursement'
        );
    }
}
