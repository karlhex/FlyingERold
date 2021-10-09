<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Traits\WithFilesListControl;
use Livewire\Component;
use App\Traits\WithMultiListControl;
use App\Rules\NationalId;
use Illuminate\Support\Facades\Log;
use App\Traits\WithSid;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;
use Illuminate\Validation\Rule;

class EditEmployee extends Component
{
    use WithEditPage;
    use WithMultiListControl;
    use WithSid;
    use WithFilesListControl;
    use WithEditSessions;

    public $msgUpdateDialog = false;

    public $user_id;
    public $national_id;

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(Employee::class);

        $this->setEditSessionName('fwemployee');

        if ($xid == 0 && session()->exists('fwemployee'))
        {
            $this->restoreEditSession();
            $cur_record = $this->restoreSubEditSession();

            $this->rtnMultiListItemOne($cur_record);

        }
        else
        {
            $this->pushSessionPath('edit-employee',__("EditEmployee"), route('dialog',['dialog'=> 'edit-employee','id' => 0]));

            $this->getEditPageData($xid ,
                                   [
                                       "id" => null,
                                       "employee_sid" => null,
                                       "name" => null,
                                       "national_id" => null,
                                       "sex" => 'M',
                                       "birthday" => null,
                                       "origin_city" => null,
                                       "ethnic" => null,
                                       "department" => null,
                                       "role" => null,
                                       "level" => null,
                                       "sign_date" => null,
                                       "join_date" => null,
                                       "sign_type" => null,
                                       "sign_duration" => null,
                                       'work_date' => null,
                                       'phone' => null,
                                       'address' => null,
                                       'emergency_person' => null,
                                       'emergency_phone' => null,
                                       'email' => null,
                                       'bank'  => null,
                                       'account' => null,
                                       'si_city' => null,
                                       'pf_accouunt' => null,
                                       'usid' => null,
                                   ]
                                  );

        $this->setMultiListItemFromModel($this->editPageRec,
                                         'work_experience',
                                [
                                    'id' =>null,
                                    'start_date' => null,
                                    'end_date' => null,
                                    'company' => null,
                                    'department' => null,
                                    'position' => null,
                                ],
                                null,
                                'sub-edit-we',
                                true);

        $this->setMultiListItemFromModel($this->editPageRec,
                                         'project_experience',
                                [
                                    'id' =>null,
                                    'start_date' => null,
                                    'end_date' => null,
                                    'project' => null,
                                    'role' => null,
                                ],
                                null,
                                'sub-edit-pe',
                                true);

        $this->setMultiListItemFromModel($this->editPageRec,
                                         'education',
                                [
                                    'id' =>null,
                                    'start_date' => null,
                                    'end_date' => null,
                                    'school' => null,
                                    'degree' => null,
                                ],
                                null,
                                'sub-edit-edu',
                                true);

        $this->setMultiListItemFromModel($this->editPageRec,
                                         'certificate',
                                [
                                    'id' =>null,
                                    'cer_name' => null,
                                    'cer_date' => null,
                                    'cer_source' => null,
                                ],
                                null,
                                'sub-edit-cer',
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

        $this->user_id = $this->edit_page_data['data']['user_id'];
        $this->national_id = $this->edit_page_data['data']['national_id'];
    }

    public function updatedUserId()
    {
        $this->edit_page_data['data']['user_id'] = $this->user_id;
    }

    public function updatedNationalId()
    {
        $this->edit_page_data['data']['national_id'] = $this->national_id;
    }

    public function save(){

        $id = $this->edit_page_data['data']['id'];

        $this->validate([
              "edit_page_data.data.employee_sid" => "required|min:11|max:11",
              "edit_page_data.data.name" => "required|min:2",
              "national_id" => ['required',new NationalId, Rule::unique('employees')->ignore($id)],
              "edit_page_data.data.sex" => "required",
              "edit_page_data.data.birthday" => "required|date",
              "edit_page_data.data.origin_city" => "required",
              "edit_page_data.data.ethnic" => "required",
              "edit_page_data.data.department" => "required",
              "edit_page_data.data.role" => "required",
              "edit_page_data.data.level" => "required|numeric|between:1,20",
              "edit_page_data.data.sign_date" => "required|date",
              "edit_page_data.data.join_date" => "required|date",
              "edit_page_data.data.sign_type" => "required",
              "edit_page_data.data.sign_duration" => "required|numeric",
              'edit_page_data.data.work_date' => "required|date",
              'edit_page_data.data.phone' => "required|digits_between:6,13",
              'edit_page_data.data.address' => "required",
              'edit_page_data.data.bank'  => "required",
              'edit_page_data.data.account' => "required|digits_between:6,20",
              'edit_page_data.data.si_city' => "required",
              'user_id' => "nullable|unique:employees,user_id,".$id,
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
        return view('livewire.edit-employee'
        );
    }
}
