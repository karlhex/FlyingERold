<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\View\Components\SelectBase;

class SelectUser extends SelectBase
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label=null,$caption=null)
    {
        Log::debug('in select person');
        $users = $this->loadUsers();
        parent::__construct($name,$label,$caption,$users);
    }

    protected function loadUsers(){
        $data = User::all();

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-user');
    }
}
