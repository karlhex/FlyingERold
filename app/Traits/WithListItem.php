<?php

namespace App\Traits;

use App\Models\SelectOption;
use Livewire\WithPagination;

trait WithListItem {

    use WithPagination;

    public $DBMODEL;
    public $editListDialog = false;
    public $confirmListDialog = false;

    public $isDeleteConfirm=true;
    public $isEditDialog=false;

    public $li_filters;
    public $li_record;
    public $li_blanks;

    public $linesPerPage = 15;

    public function readItems()
    {
        return $this->DBMODEL::filter($this->li_filters)->paginate($this->linesPerPage);
    }

    public function setListFilter($filters)
    {
        $this->li_filters = $filters;
    }

    public function setListItem($li_blanks)
    {
        $this->li_blanks = $li_blanks;

        $this->clearListItem();
    }

    public function editListItem($id)
    {
        if ($id == null || $id == 0)
            $this->clearListItem();
        else
            $this->li_record = $this->DBMODEL::where('id',$id)->first()->toArray();

        $this->editListDialog = true;
    }

    public function deleteListItem($id)
    {
        $this->li_record['id'] = $id;

        if ($this->isDeleteConfirm)
            $this->confirmListDialog = true;
        else
            $this->confirmedDeletion();

    }

    public function clearListItem()
    {
        $this->li_record = $this->li_blanks;
    }

    public function confirmedDeletion()
    {
        $this->DBMODEL::where('id',$this->li_record['id'])->delete();

        if ($this->isDeleteConfirm)
            $this->confirmListDialog = false;
    }

    public function saveListItem()
    {
        if ($this->li_record['id'])
            $this->DBMODEL::find($this->li_record['id'])->update($this->li_record);
        else
            $this->DBMODEL::create($this->li_record);

        $this->editListDialog = false;
    }

    public function xlatListItem($name,$item)
    {

        switch (substr($name,0,1))
        {
            case '.':
                $a = explode('.',substr($name,1));
                $a1 = $a[0];
                $a2 = $a[1];
                $value = $item->$a1->$a2;
                break;
            case '@':
                $a = explode('.',substr($name,1));
                $a1 = $a[0];
                $a2 = $a[1];
                $rec = SelectOption::where('key',$a2)
                                   ->where('option',$item->$a1)
                                   ->first();
                $value = $rec->value;
                break;
            default:
                $value = $item->$name;
        }
        return $value;
    }
}
