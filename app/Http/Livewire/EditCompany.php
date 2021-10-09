<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;

class EditCompany extends Component
{

    use WithEditPage;
    use WithEditSessions;

    public $rules = [
        'edit_page_data.data.name' => 'required',
        'edit_page_data.data.phone' => 'required',
        'edit_page_data.data.email' => 'nullable|email',
    ];

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(Company::class);

        $this->pushSessionPath('edit-company',__("EditCompany"), route('dialog',['dialog'=> 'edit-company','id' => 0]));

        $this->getEditPageData($xid ,
                               [
                                   'id'   => 0,
                                   'name' => null,
                                   'address' => null,
                                   'email'  => null,
                                   'phone'  => null,
                                   'site' => null,
                                   'business_person'  => null,
                                   'tech_person'  => null,
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
        return view('livewire.edit-company'
        );
    }
}
