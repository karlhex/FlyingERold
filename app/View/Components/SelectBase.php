<?php

namespace App\View\Components;

use App\View\Components\LabelInput;

class SelectBase extends LabelInput
{
    public $options;
    public $caption;
    /**
     * Create a new component instance.
     * @param name  名字，必须输入
     * @param label 标题
     * @param caption 选择框的标题
     * @param options 选择的列表
     *
     * @return void
     */
    public function __construct($name,$label=null,$caption=null, $options = null)
    {
        parent::__construct($name,$label);
        $this->setOptions($options);
        $this->caption = $caption;
    }

    /**
     * Set the options
     * @param options 选择的列表.
     *
     *  @return void
     */
    public function setOptions($options)
    {
        if (is_array($options))
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
