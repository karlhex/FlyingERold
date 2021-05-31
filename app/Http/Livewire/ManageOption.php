<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SelectOption;
use App\Traits\WithListItem;

class ManageOption extends Component
{
    use WithListItem;

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
    }

    public function render()
    {
        return view('livewire.manage-option',
        [ 'data' => $this->readItems(), ]);
    }
}
