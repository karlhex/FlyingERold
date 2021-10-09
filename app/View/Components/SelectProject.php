<?php

namespace App\View\Components;

use App\Models\Project;
use Illuminate\Support\Facades\Log;
use App\View\Components\SelectBase;

class SelectProject extends SelectBase
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label=null,$caption=null)
    {
        $data = $this->loadProjects();
        parent::__construct($name,$label,$caption,$data);
    }

    protected function loadProjects(){
        $data = Project::all();

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Projects\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-project');
    }
}
