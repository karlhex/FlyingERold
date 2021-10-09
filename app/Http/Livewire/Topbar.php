<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Topbar extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-topbar' => '$refresh',
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('topbar');
    }
}
