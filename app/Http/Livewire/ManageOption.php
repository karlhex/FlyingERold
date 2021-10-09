<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SelectOption;
use App\Traits\WithEditSessions;
use App\Traits\WithListItem;

class ManageOption extends Component
{
    use WithListItem;
    use WithEditSessions;

    protected $rules = [
        'li_record.key' => 'required|max:30',
        'li_record.option' => 'required|max:30',
        'li_record.value' => 'required|max:50',
    ];

    public function mount()
    {
        $this->setListItem([
            'id' => null,
            'key' => null,
            'option' => null,
            'value' => null,
        ]);

        $this->setListFilter([
            'key' => null,
            'option' => null,
            'value' => null,
        ]);

        $this->DBMODEL = SelectOption::class;
        $this->pushSessionPath('manage-option',__("ManageOption"),route('frame',[ 'frame' =>'manage-option']) ,true);
    }

    public function render()
    {
        return view('livewire.manage-option',
        [ 'data' => $this->readItems(), ]);
    }
}
