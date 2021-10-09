<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait WithEditSessions
{
    public $useEditSession = true;

    public $editSessionDataList = [];

    public $editSessionName = 'flyingwings';

    public $editSessionPath ;

    public $fwSessionPath = 'fwSessionPath';

    /**
     * 设置Session名称
     *
     *  @return void
     */
    public function setEditSessionName($name)
    {
        $this->editSessionName = $name;
    }

    /**
     * 设置子窗口条回的路径
     *
     *  @return void
     */
    public function pushSessionPath($name,$label,$route,$top=false)
    {
        $rec['name'] = $name;
        $rec['route'] = $route;
        $rec['label'] = $label;

        $fwpath = session()->get($this->fwSessionPath);

        if ($fwpath != null && end($fwpath)['name'] == $name)
            return;

        if ($fwpath == null || $top)
            $fwpath = [];

        array_push($fwpath,$rec);

        $this->editSessionPath = $fwpath;

        session()->put($this->fwSessionPath,$fwpath);
    }


    public function popSessionPath()
    {
        $fwpath = session()->get('fwSessionPath');

        if ($fwpath == null)
            return  "#" ;

        $rec = array_pop($fwpath);

        session()->put('fwSessionPath',$fwpath);

        return end($fwpath)['route'];
    }

    public function returnToParent()
    {
        redirect()->to($this->popSessionPath());
    }

    /**
     * 设定一条需要保存在session里的数据
     *
     *  @return void
     */
    public function setEditSessionDataName($dataname)
    {
        array_push($this->editSessionDataList,$dataname);
    }

    /**
     * 从SESSION把数据恢复出来
     *
     *  @return void
     */
    public function restoreEditSession()
    {
        /* 恢复父窗口数据 */
        $data = session()->pull($this->editSessionName);

        $data = $data[0];

        foreach ($data as $name => $rec)
        {
            Log::debug("name = ".$name);
            $this->$name = $rec;
        }

    }

    /**
     * 保存父窗口数据
     *
     *  @return void
     */
    public function saveEditSession()
    {
        $data = [];

        foreach ($this->editSessionDataList as $name)
            $data[$name] = $this->$name;

        session()->push($this->editSessionName,$data);
    }

    /**
     * 恢复子窗口数据
     *
     *  @return sessiondata
     */
    public function restoreSubEditSession()
    {

        $record = session()->get('subeditdata');

        if ($record == null)
            return [ 'xkey' => -1,'type' => '#'];

        return $record;
    }

    /**
     * 保存子窗口数据
     *
     *  @return void
     */
    public function saveSubEditSession($record)
    {
        // $record['parent'] = $this->editSessionParent;

        session()->flash('subeditdata',$record);

    }

}
