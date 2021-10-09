<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditPage extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-page');
    }
}
