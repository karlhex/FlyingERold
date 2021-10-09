<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithEditSessions;
use App\Traits\WithSelectOption;

class SubEditWe extends Component
{
    use WithEditSessions;
    use WithSelectOption;

    public $rules=[
            'cur_record.data.start_date' => 'required|date',
            'cur_record.data.end_date' => 'required|date|gte:cur_record.data.start_date',
            'cur_record.data.company' => 'required|min:5',
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

        $this->pushSessionPath('sub-edit-we',__("SubEditWe"),route('dialog',['dialog'=> 'sub-edit-we','id' => 0]));
    }

    public function save(){

        $this->validate();

        $this->saveSubEditSession($this->cur_record);

        session()->flash('message','Work experience has been updated...');

        $this->returnToParent();

    }

    public function cancel()
    {
        $this->returnToParent();
    }

    public function render()
    {
        return view('livewire.sub-edit-we'
        );
    }
}
