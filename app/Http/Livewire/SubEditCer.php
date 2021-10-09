<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithEditSessions;
use App\Traits\WithSelectOption;

class SubEditCer extends Component
{
    use WithEditSessions;
    use WithSelectOption;

    public $rules=[
            'cur_record.data.cer_name' => 'required|min:4',
            'cur_record.data.cer_date' => 'required|date',
            'cur_record.data.cer_source' => 'required',
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

        $this->pushSessionPath('sub-edit-cer',__("SubEditCer"),route('dialog',['dialog'=> 'sub-edit-cer','id' => 0]));
    }

    public function save(){

        $this->validate();

        $this->saveSubEditSession($this->cur_record);

        session()->flash('message','Certificates has been updated...');

        $this->returnToParent();

    }

    public function cancel()
    {
        $this->returnToParent();
    }

    public function render()
    {
        return view('livewire.sub-edit-cer'
        );
    }
}
