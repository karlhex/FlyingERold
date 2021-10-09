<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Traits\WithFilesListControl;
use Livewire\Component;
use App\Traits\WithMultiListControl;
use App\Traits\WithSid;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;
use Illuminate\Support\Facades\Log;

class EditProject extends Component
{
    use WithMultiListControl;
    use WithSid;
    use WithFilesListControl;
    use WithEditPage;
    use WithEditSessions;

    public $msgUpdateDialog = false;

    public $rules = [
        'edit_page_data.data.sid' => 'required',
        'edit_page_data.data.start_date' => 'required|date',
        'edit_page_data.data.status'    => 'required',
    ];

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(Project::class);

        $this->setEditSessionName('fwproject');

        if ($xid == 0 && session()->exists('fwproject'))
        {
            $this->restoreEditSession();
            $cur_record = $this->restoreSubEditSession();

            $this->rtnMultiListItemOne($cur_record);

        }
        else
        {
            $this->pushSessionPath('edit-project',__("EditProject"), route('dialog',['dialog'=> 'edit-project','id' => 0]));

            $this->getEditPageData($xid ,
                                   [
                                       "id" => null,
                                       "sid" => null,
                                       "start_date" => null,
                                       "end_date" => null,
                                       "status" => 'planning',
                                   ]
                                  );

            $this->setMultiListItemFromModel($this->editPageRec,
                                             'contracts',
                                             [],
                                             ['type_name'],
                                             '#',
                                             false
                                            );

            $this->setMultiListItemFromModel($this->editPageRec,
                                         'plans',
                                        [
                                            'id' => -1,
                                            'charge_person' => null,
                                            'action_person' => null,
                                            'instruction' => '',
                                            'start_date'  => null,
                                            'end_date'    => null,
                                            'act_start_date' => null,
                                            'act_end_date'   => null,
                                            'status'  => 'waiting',
                                        ],
                                          ['charge_person_name','status_name'],
                                'sub-edit-plan',
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

        $this->validate();

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
        return view('livewire.edit-project'
        );
    }
}
