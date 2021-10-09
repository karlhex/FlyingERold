<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithEditSessions;
use App\Traits\WithSelectOption;

class SubEditSop extends Component
{
    use WithEditSessions;
    use WithSelectOption;

    /**
     *  以下主要是需要update的数据。
     */
    public $cur_record;

    public $rules=[
            'cur_record.data.instruction' => 'required|min:2',
            'cur_record.data.amount' => 'required|numeric',
            'cur_record.data.schedule_date' => 'required|date',
            'cur_record.data.tran_date' => 'nullable|date',
    ];

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount(){
        $this->cur_record = $this->restoreSubEditSession();

        $this->pushSessionPath('sub-edit-sop',__("SubEditSop"),route('dialog',['dialog'=> 'sub-edit-sop','id' => 0]));
    }

    public function save(){

        $this->validate();

        $this->getDrcrName();

        $this->saveSubEditSession($this->cur_record);

        session()->flash('message','Schedule of payment has been updated...');

        $this->returnToParent();

    }

    public function getDrcrName()
    {
        $this->cur_record['data']['drcr_name'] = $this->getSelectOptionValue('drcr',$this->cur_record['data']['drcr']);
    }

    public function render()
    {
        return view('livewire.sub-edit-sop'
        );
    }
}
