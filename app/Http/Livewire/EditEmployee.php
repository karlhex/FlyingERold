<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use App\Traits\WithMultiListControl;
use Illuminate\Support\Facades\Log;

class EditEmployee extends Component
{
    use WithMultiListControl;

    protected $fw_employee;

    /**
     *  以下主要是需要update的数据。
     */
    public $employee;

    /**
     * 各种id
     */
    public $employee_id;
    public $current_we_id = -1;
    public $current_edu_id = -1;
    public $current_cer_id = -1;
    public $current_pe_id = -1;


    public $editPEDialog = false;
    public $editWEDialog = false;
    public $editEduDialog = false;
    public $editCerDialog = false;
    public $msgUpdateDialog = false;

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($employeeid = 0){
        $this->employee_id = $employeeid;
        $this->getEmployee();

        $this->setMultiListItemFromModel($this->fw_employee,
                                         'work_experience',
                                [
                                    'id' =>null,
                                    'start_date' => null,
                                    'end_date' => null,
                                    'company' => null,
                                    'department' => null,
                                    'position' => null,
                                ]);

        $this->setMultiListItemFromModel($this->fw_employee,
                                         'project_experience',
                                [
                                    'id' =>null,
                                    'start_date' => null,
                                    'end_date' => null,
                                    'project' => null,
                                    'role' => null,
                                ]);

        $this->setMultiListItemFromModel($this->fw_employee,
                                         'education',
                                [
                                    'id' =>null,
                                    'start_date' => null,
                                    'end_date' => null,
                                    'school' => null,
                                    'degree' => null,
                                ]);

        $this->setMultiListItemFromModel($this->fw_employee,
                                         'certificate',
                                [
                                    'id' =>null,
                                    'cer_name' => null,
                                    'cer_date' => null,
                                    'cer_source' => null,
                                ]);

    }

    public function save(){
        if ($this->employee['id'])
        {
            $this->fw_employee = Employee::find($this->employee['id']);
            $this->fw_employee->update($this->employee);
        }
        else
        {
            $this->fw_employee = Employee::create($this->employee);

            $this->employee = $this->fw_employee->toArray();
        }

        $this->saveMultiListItem($this->fw_employee,$this->employee['id']);

        $this->msgUpdateDialog = true;
    }


    protected function clearEmployee(){
        $this->employee=[
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
        ];
    }

    public function getEmployee(){
        $this->clearEmployee();

        if ($this->employee_id){
            $data = Employee::where('id',$this->employee_id)->first();

            $this->fw_employee = $data;

            if ($data)
            {
                $this->employee = $data->toArray();
            }

        }
    }

    public function callMultiListDialog($name,$key)
    {
        switch ($name)
        {
            case 'work_experience':
                $this->current_we_id = $key;
                $this->editWEDialog = true;
                break;
            case 'project_experience':
                $this->current_pe_id = $key;
                $this->editPEDialog = true;
                break;
            case 'education':
                $this->current_edu_id = $key;
                $this->editEduDialog = true;
                break;
            case 'certificate':
                $this->current_cer_id = $key;
                $this->editCerDialog = true;
                break;
        }
    }

    public function saveWE()
    {

        if ($this->current_we_id < 0 )
            array_push($this->mlm_record['work_experience'],$this->cur_record);
        else
            $this->mlm_record['work_experience'][$this->current_product_id] = $this->cur_record;

        $this->editWEDialog = false;
    }

    public function savePE()
    {

        if ($this->current_pe_id < 0 )
            array_push($this->mlm_record['project_experience'],$this->cur_record);
        else
            $this->mlm_record['project_experience'][$this->current_sop_id] = $this->cur_record;

        $this->editPEDialog = false;
    }

    public function saveEdu()
    {

        if ($this->current_edu_id < 0 )
            array_push($this->mlm_record['education'],$this->cur_record);
        else
            $this->mlm_record['education'][$this->current_sop_id] = $this->cur_record;

        $this->editEduDialog = false;
    }

    public function saveCer()
    {

        if ($this->current_cer_id < 0 )
            array_push($this->mlm_record['certificate'],$this->cur_record);
        else
            $this->mlm_record['certificate'][$this->current_sop_id] = $this->cur_record;

        $this->editCerDialog = false;
    }

    public function render()
    {
        return view('livewire.edit-employee'
        );
    }
}
