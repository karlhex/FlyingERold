<?php

namespace App\Traits;

trait WithEditPage
{
    public $useEditPage = true;

    public $editPageModel= null;

    public $editPageRec = null;

    public $edit_page_data;

    public function mountWithEditPage()
    {
        if (isset($this->useEditSession))
            $this->setEditSessionDataName('edit_page_data');
    }

    public function setEditPageModel($model)
    {
        $this->editPageModel = $model;
    }

    public function getEditPageData($id,$default=null)
    {
        $this->edit_page_data['id'] = $id;
        $this->edit_page_data['default'] = $default;

        $data= $this->editPageModel::where('id',$id)->first();

        if ($data == null)
            $this->edit_page_data['data'] = $default;
        else
        {
            $this->editPageRec = $data;
            $this->edit_page_data['data'] = $data->toArray();
        }
    }

    public function saveEditPage()
    {
        if ($this->edit_page_data['id']>0)
        {
            $fw_data = $this->editPageModel::find($this->edit_page_data['id']);
            $fw_data->update($this->edit_page_data['data']);
        }
        else
        {
            $fw_data = $this->editPageModel::create($this->edit_page_data['data']);

            $this->edit_page_data['data'] = $fw_data->toArray();
        }

        if (isset($this->useMultiListControl))
            $this->saveMultiListItem($fw_data,$this->edit_page_data['id']);

        if (isset($this->useFilesListControl))
            $this->saveFilesListItem($fw_data,$this->edit_page_data['id']);
    }

    public function removeEditPage()
    {
        if ($this->edit_page_data['id'] <= 0)
            return;

        $id = $this->edit_page_data['id'];

        $fw_data = $this->editPageModel::find($id);

        if (isset($this->useMultiListControl))
            $this->removeMultiListItem($fw_data,$id);

        if (isset($this->useFilesListControl))
            $this->removeFilesListItem($fw_data,$id);

        $fw_data->delete();

    }
}
