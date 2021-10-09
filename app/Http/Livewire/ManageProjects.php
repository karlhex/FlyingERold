<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Traits\WithEditSessions;
use Livewire\Component;
use App\Traits\WithListItem;

class ManageProjects extends Component
{
    use WithListItem;
    use WithEditSessions;

    public function mount()
    {

        $this->DBMODEL = Project::class;

        $this->setListFilter([
            'sid' => null,
            'name' => null,
            'start_date' => null,
            'status' => null,
        ]);

        $this->pushSessionPath('manage-projects',__("ManageProjects"),route('frame',[ 'frame' =>'manage-projects']) ,true);
    }

    public function render()
    {
        return view('livewire.manage-projects',[
            'data' => $this->readItems(),
        ]);
    }
}
