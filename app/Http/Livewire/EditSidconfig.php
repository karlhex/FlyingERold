<?php

namespace App\Http\Livewire;

use App\Models\Sidconfig;
use Livewire\Component;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;

class EditSidconfig extends Component
{

    use WithEditPage;
    use WithEditSessions;

    public $rules = [
        'edit_page_data.data.key' => 'required',
        'edit_page_data.data.prefix' => 'required',
        'edit_page_data.data.length' => 'required|numeric|max:20',
        'edit_page_data.data.current_no' => 'required|numeric',
        'edit_page_data.data.max_no' => 'required|numeric',
        'edit_page_data.data.clear_interval' => 'required',
    ];

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(Sidconfig::class);

        $this->pushSessionPath('edit-project',__("EditProject"), route('dialog',['dialog'=> 'edit-project','id' => 0]));

        $this->getEditPageData($xid ,
                               [
                                   "id" => null,
                                   "key" => null,
                                   "prefix" => null,
                                   "inc_year" => false,
                                   "inc_month" => false,
                                   "inc_day"  => false,
                                   "length" => 6,
                                   "current_no" => 0,
                                   "max_no" => 99999999,
                                   "clear_interval" => 'never',
                               ]
        );

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
        return view('livewire.edit-sidconfig'
        );
    }
}
