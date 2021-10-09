<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithEditSessions;
use App\Traits\WithSelectOption;

class SubEditRbdetail extends Component
{
    use WithEditSessions;
    use WithSelectOption;

    public $rules=[
      "cur_record.data.date" => "required|date",
      "cur_record.data.reason" => "required",
      "cur_record.data.amount" => "required|numeric",
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

        $this->pushSessionPath('sub-edit-rbdetail',__("SubEditRbdetail"),route('dialog',['dialog'=> 'sub-edit-rbdetail','id' => 0]));
    }

    public function save(){

        $this->validate();

        $this->saveSubEditSession($this->cur_record);

        session()->flash('message','Plan has been updated...');

        $this->returnToParent();

    }

    public function render()
    {
        return view('livewire.sub-edit-rbdetail'
        );
    }
}
