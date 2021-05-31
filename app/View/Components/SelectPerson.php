<?php

namespace App\View\Components;

use App\Models\Person;
use Illuminate\Support\Facades\Log;
use App\View\Components\SelectBase;

class SelectPerson extends SelectBase
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label=null,$captions=null)
    {
        Log::debug('in select person');
        $people = $this->loadPeople();
        parent::__construct($name,$label,$captions,$people);
    }

    protected function loadPeople(){
        $data = Person::all();
        $people = null;

        $data = $data->fresh();

        foreach ($data as $item)
            $people[$item['id']] = $item['name'].' * '.$item['company_name'].' * '.$item['department'];

        return $people;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-base');
    }
}
