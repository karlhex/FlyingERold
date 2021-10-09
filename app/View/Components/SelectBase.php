<?php

namespace App\View\Components;

use App\View\Components\Editbase;

class SelectBase extends EditBase
{
    public $options;
    public $caption;
    public $select2;
    /**
     * Create a new component instance.
     * @param name  名字，必须输入
     * @param label 标题
     * @param caption 选择框的标题
     * @param options 选择的列表
     *
     * @return void
     */
    public function __construct($name,$label=null,$caption, $options = null,$select2=null)
    {
        parent::__construct($name,$label);
        $this->setOptions($options);
        $this->caption = $caption;
        if ($select2)
            $this->select2 = 'select2';
        else
            $this->select2 = '';
    }

    /**
     * Set the options
     * @param options 选择的列表.
     *
     *  @return void
     */
    public function setOptions($options)
    {
            $this->options = $options;
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
