<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait WithMultiListControl{

    public $mlm_record;
    public $cur_record;
    public $mlm_blanks;

    public function setMultiListItem($listname,$mlm_record,$mlm_blanks)
    {
        $this->mlm_blanks[$listname] = $mlm_blanks;
        $this->mlm_record[$listname] = $mlm_record;
    }

    public function setMultiListItemFromModel($parentdb,$name,$default=null)
    {
        $items = [];
        $blanks = [];

        if ($parentdb != null)
        {
            $data = $parentdb->$name()->orderBy('sequence')->get();

            foreach ($data as $rec)
            {
                $item = $rec->toArray();

                array_push($items,$item);
            }


            $columns = \Schema::getColumnListing($parentdb->getTable());

            foreach ($columns as $column)
            $blanks[$column]  = null;

        }

        if ($default != null)
            $blanks = $blanks + $default;

        $this->mlm_record[$name] = $items;
        $this->mlm_blanks[$name] = $blanks;

    }

    public function editMultiListItem($listname,$key=-1)
    {
        if ( $key < 0)
            $this->cur_record = $this->mlm_blanks[$listname];
        else
            $this->cur_record = $this->mlm_record[$listname][$key];

        $this->callMultiListDialog($listname,$key);
    }

    public function deleteMultiListItem($listname,$key)
    {
        unset($this->mlm_record[$listname][$key]);
    }

    public function swapMultiListItem($name,$k1,$k2)
    {
        if ($k1 >=0 and $k2 >= 0
           and $k1 < count($this->mlm_record[$name])
           and $k2 < count($this->mlm_record[$name]) )
        {
            $d1 = $this->mlm_record[$name][$k1];
            $d2 = $this->mlm_record[$name][$k2];

            $this->mlm_record[$name][$k1] = $d2;
            $this->mlm_record[$name][$k2] = $d1;
        }

    }

    public function moveupMultiListItem($name,$key){
        $this->swapMultiListItem($name,$key-1,$key);
    }

    public function movedownMultiListItem($name,$key){
        $this->swapMultiListItem($name,$key,$key+1);
    }

    public function saveMultiListItem($parentdb,$id){
        foreach ($this->mlm_record as $key => $rec)
            $this->saveMultiListItemOne($parentdb,$key,$id,$rec);
    }

    public function saveMultiListItemOne($parentdb,$name,$id,$rec){
        $num = 10;

        $items = $parentdb->$name()->get();

        foreach ($items as $xid)
        {
            if (!in_array($xid->id,array_column($rec,'id')))
            {
                Log::debug("not in array ".$xid->id);
                $parentdb->$name()->find($xid->id)->delete();
            }
        }

        foreach ($rec as $item )
        {
            $item['contract_id']  = $id;
            $item['sequence'] = $num;
            Log::debug("contract_id".$id." itemid ".$item['id']);
            $a = $parentdb->$name()->find($item['id']);
            if ($a != null)
                $a->update($item);
            else
                $a = $parentdb->$name()->create($item);

            Log::debug("contract_id".$id." itemid ".$a->id);

            $num += 10;
        }
    }
}
