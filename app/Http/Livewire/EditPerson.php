<?php

namespace App\Http\Livewire;

use App\Models\Person;
use Livewire\Component;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;

class EditPerson extends Component
{
    use WithEditPage;
    use WithEditSessions;

    public $rules = [
        'edit_page_data.data.name' => 'required',
        'edit_page_data.data.company_name' => 'required',
        'edit_page_data.data.phone1' => 'required',
        'edit_page_data.data.email' => 'nullable|email',
    ];

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(Person::class);

        $this->pushSessionPath('edit-project',__("EditProject"), route('dialog',['dialog'=> 'edit-project','id' => 0]));

        $this->getEditPageData($xid ,
                               [
                                   "id" => null,
                                   "name" => null,
                                   "phone1" => null,
                                   "phone2" => null,
                                   "phone3" => null,
                                   "email"  => null,
                                   "company_name" => null,
                                   "department" => null,
                                   "position" => null,
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
        return view('livewire.edit-person'
        );
    }
}
