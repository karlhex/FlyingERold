<?php

namespace App\View\Components;

use App\Models\ProductInfo;
use App\View\Components\SelectBase;

class SelectProductInfo extends SelectBase
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label=null,$caption=null)
    {
        $data = $this->loadProductInfo();
        parent::__construct($name,$label,$caption,$data);
    }

    protected function loadProductInfo(){
        $data = ProductInfo::all();

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-product-info');
    }
}
