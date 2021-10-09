<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait WithMultiListControl{

    protected $useMultiListControl = true;

    /**
     *  多列表的数据
     */
    public $mlm_record = [];

    public $cur_record = [ 'xkey' => -1,
                           'type' => null,
                           'data' => [],
                           'parent' => '#',
                         ];


    public function mountWithMultiListControl()
    {
        Log::debug('WithMultiListControl mounted');
        
        if (isset($this->useEditSession))
            $this->setEditSessionDataName('mlm_record');
    }

    /**
     * 设置列表的数据
     *  @var listname : 列表名称
     *  @var mlm_record: 列表内容
     *  @var url : 子窗口地址
     *
     *  @return void
     */
    public function setMultiListItem($listname,$records,$default,$url,$editable=true)
    {
        $data['record'] = $records;
        $data['default'] = $default;
        $data['url']  = $url;
        $data['editable'] = $editable;

        $this->mlm_record[$listname] = $data;
    }

    /**
     * 直接从model中取的数据列表
     * @var parentdb : 父模型
     * @var listname : 列表名称
     * @var URL : 子窗口名称
     *
     *  @return void
     */
    public function setMultiListItemFromModel($parentdb,$listname,$default,$casts = null, $url='#',$editable=true)
    {
        $items = [];

        if ($parentdb != null)
        {
            $data = $parentdb->$listname;

            //$data = $parentdb->$listname()->orderBy('sequence')->get();

            foreach ($data as $rec)
            {

                $item = $rec->toArray();

                /* 这里主要处理castable的数据，因为castable数据不能直接取到 */
                if ($casts != null)
                    foreach ($casts as $name)
                    {
                        $val = $rec->$name;

                        $item[$name] = $val;

                    }

                array_push($items,$item);
            }

        }

        $this->setMultiListItem($listname,$items,$default,$url,$editable);
    }

    /**
     * 编辑一条数据
     *  @var listname 表名
     *  @var key  表内键值
     *
     *  @return void
     */
    public function editMultiListItem($listname,$key)
    {
        Log::debug('listname '.$listname . ' key'. $key);

        $this->cur_record['xkey'] = $key;
        $this->cur_record['type'] = $listname;
        if ($key < 0)
            $this->cur_record['data'] = $this->mlm_record[$listname]['default'];
        else
            $this->cur_record['data'] = $this->mlm_record[$listname]['record'][$key];

        $this->callMultiListDialog();
    }

    public function callMultiListDialog()
    {
        $listname = $this->cur_record['type'];
        if (isset($this->useEditSession))
        {
            $this->saveEditSession();
            $this->saveSubEditSession($this->cur_record);
            redirect()->to(route('dialog',['dialog'=>$this->mlm_record[$listname]['url'],'id' => 0]));
        }else
        {
            $url = $this->mlm_record[$listname]['url'];
            $this->$url = true;
        }
    }

    /**
     * 删除一条纪录
     *  @var listname 列表名
     *  @var key 列表内序号
     *
     *  @return void
     */
    public function deleteMultiListItem($listname,$key)
    {
        unset($this->mlm_record[$listname]['record'][$key]);
    }

    public function swapMultiListItem($name,$k1,$k2)
    {
        if ($k1 >=0 and $k2 >= 0
           and $k1 < count($this->mlm_record[$name]['record'])
           and $k2 < count($this->mlm_record[$name]['record']) )
        {
            $d1 = $this->mlm_record[$name]['record'][$k1];
            $d2 = $this->mlm_record[$name]['record'][$k2];

            $this->mlm_record[$name]['record'][$k1] = $d2;
            $this->mlm_record[$name]['record'][$k2] = $d1;
        }

    }

    /**
     * 当前纪录向上移动一格
     *  @var listname 列表名
     *  @var key 列表内序号
     *
     *  @return void
     */
    public function moveupMultiListItem($name,$key){
        $this->swapMultiListItem($name,$key-1,$key);
    }

    /**
     * 当前纪录向下移动一格
     *  @var listname 列表名
     *  @var key 列表内序号
     *
     *  @return void
     */
    public function movedownMultiListItem($name,$key){
        $this->swapMultiListItem($name,$key,$key+1);
    }

    /**
     * 保存列表内的数据入数据库
     *
     *  @var parentdb 父模型
     *  @var id 父纪录的id
     *  @return void
     */
    public function removeMultiListItem($parentdb,$id){
        foreach ($this->mlm_record as $key => $rec)
            $this->removeMultiListItemOne($parentdb,$key,$id,$rec);
    }

    /**
     * 保存列表内的一条列表数据入数据库
     *
     *  @var parentdb 父模型
     *  @var name 列表名
     *  @var rec 一条列表纪录
     *  @var id 父纪录的id
     *  @return void
     */
    public function removeMultiListItemOne($parentdb,$name,$id,$rec){

        /* 如果数据是不可编辑的，就直接返回了 */
        if ( !$rec['editable'])
            return;

        $items = $parentdb->$name()->get();

        foreach ($items as $xid)
            $parentdb->$name()->find($xid->id)->delete();
    }

    /**
     * 删除列表内的数据入数据库
     *
     *  @var parentdb 父模型
     *  @var id 父纪录的id
     *  @return void
     */
    public function saveMultiListItem($parentdb,$id){
        foreach ($this->mlm_record as $key => $rec)
            $this->saveMultiListItemOne($parentdb,$key,$id,$rec);
    }

    /**
     * 保存列表内的一条列表数据入数据库
     *
     *  @var parentdb 父模型
     *  @var name 列表名
     *  @var rec 一条列表纪录
     *  @var id 父纪录的id
     *  @return void
     */
    public function saveMultiListItemOne($parentdb,$name,$id,$rec){

        /* 如果数据是不可编辑的，就直接返回了 */
        if ( !$rec['editable'])
            return;

        $num = 10;

        $items = $parentdb->$name()->get();

        foreach ($items as $xid)
        {
            if (!in_array($xid->id,array_column($rec['record'],'id')))
            {
                Log::debug("not in array ".$xid->id);
                $parentdb->$name()->find($xid->id)->delete();
            }
        }

        foreach ($rec['record'] as $item )
        {
            $item['sequence'] = $num;

            $a = $parentdb->$name()->find($item['id']);
            if ($a != null)
                $a->update($item);
            else
                $a = $parentdb->$name()->create($item);

            $num += 10;
        }
    }


    /**
     * 处理返回的数据
     *
     *  @var cur_record 当前更改的纪录
     *
     *  @return void
     */
    public function rtnMultiListItemOne($cur_record)
    {
        $key = $cur_record['xkey'];
        $name = $cur_record['type'];

        if ($name == '#')
            return;

        if ($key < 0)
            array_push($this->mlm_record[$name]['record'],$cur_record['data']);
        else
            $this->mlm_record[$name]['record'][$key] = $cur_record['data'];

        $this->cur_record = $cur_record;
    }
}
