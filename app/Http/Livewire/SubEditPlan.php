<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use App\Traits\WithEditSessions;
use App\Traits\WithSelectOption;

class SubEditPlan extends Component
{
    use WithEditSessions;
    use WithSelectOption;

    public $rules=[
      "cur_record.data.charge_person" => "required",
      "cur_record.data.start_date" => "required|date",
      "cur_record.data.end_date" => "required|date",
      "cur_record.data.status" => "required",
      "cur_record.data.instruction" => "required",

    ];
    /**
     *  以下主要是需要update的数据。
     */
    public $cur_record;

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount(){
        $this->cur_record = $this->restoreSubEditSession();

        $this->pushSessionPath('sub-edit-plan',__("SubEditPlan"),route('dialog',['dialog'=> 'sub-edit-plan','id' => 0]));
    }

    public function save(){

        $this->validate();

        $this->getChargePersonName();
        $this->getStatusName();

        $this->saveSubEditSession($this->cur_record);

        session()->flash('message','Plan has been updated...');

        $this->returnToParent();

    }

    public function getChargePersonName()
    {
        $person = Employee::where('id',$this->cur_record['data']['charge_person'])->first();

        $this->cur_record['data']['charge_person_name'] = $person->name;
    }

    public function getStatusName()
    {
        $this->cur_record['data']['status_name'] = $this->getSelectOptionValue('planstatus',$this->cur_record['data']['status']);
    }

    public function cancel()
    {
        $this->returnToParent();
    }

    public function render()
    {
        return view('livewire.sub-edit-plan'
        );
    }
}
