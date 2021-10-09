<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

trait WithFilesListControl{

    use WithFileUploads;

    public $useFilesListControl = true;
    public $files_record;
    public $cur_file;
    public $tmp_uploadfile;
    public $files_blanks;
    public $editFileItemDialog = false;

    public $viewPDF = false;
    public $viewPDFUrl;

    public function mountWithFilesListControl()
    {
        Log::debug('WithFilesListControl mounted');

        if (isset($this->useEditSession))
        {
            $this->setEditSessionDataName('files_record');
            $this->setEditSessionDataName('files_blanks');
        }

    }

    public function setFilesListItem($files_record,$files_blanks)
    {
        $this->files_blanks = $files_blanks;
        $this->files_record = $files_record;
    }

    public function setFilesListItemFromModel($parentdb,$default=null)
    {
        $items = [];
        $blanks = ['name' => null,
                   'origin_name' =>null,
                   'file' => null,
                   'type' => 'image',
                   'thumbnail' => null,
                  ];

        if ($parentdb != null)
        {
            $data = $parentdb->files()->orderBy('sequence')->get();

            foreach ($data as $rec)
            {
                $item = $rec->toArray();

                array_push($items,$item);
            }

        }

        if ($default != null)
            $blanks = $blanks + $default;

        $this->files_record = $items;
        $this->files_blanks = $blanks;

    }

    public function editFilesListItem($key=-1)
    {
        if ( $key < 0)
            $this->cur_file = $this->files_blanks;
        else
            $this->cur_file = $this->files_record[$key];

        $this->editFileItemDialog = true;
    }

    public function deleteFilesListItem($key)
    {
        unset($this->files_record[$key]);
    }

    public function downloadFilesListItem($key)
    {
        $f = $this->files_record[$key];

        $pdf =  Storage::disk('local')->download($f['file']);

        $pdfname = Storage::disk('local')->url($f['file']);

        $r=response($pdf, 200)->withHeaders([
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=".$pdfname,
        ]);

        dd($r);
    }

    public function swapFilesListItem($k1,$k2)
    {
        if ($k1 >=0 and $k2 >= 0
           and $k1 < count($this->files_record)
           and $k2 < count($this->files_record) )
        {
            $d1 = $this->files_record[$k1];
            $d2 = $this->files_record[$k2];

            $this->files_record[$k1] = $d2;
            $this->files_record[$k2] = $d1;
        }

    }

    public function moveupFilesListItem($key){
        $this->swapFilesListItem($key-1,$key);
    }

    public function movedownFilesListItem($key){
        $this->swapFilesListItem($key,$key+1);
    }

    public function saveFilesListItem($parentdb,$id){
        $num = 10;

        $items = $parentdb->files()->get();

        foreach ($items as $xid)
        {
            if (!in_array($xid->id,array_column($this->files_record,'id')))
            {
                Log::debug("not in array ".$xid->id);
                $parentdb->files()->find($xid->id)->delete();
            }
        }

        foreach ($this->files_record as $item )
        {
            $item['sequence'] = $num;
            Log::debug("contract_id".$id." itemid ".$item['id']);
            $a = $parentdb->files()->find($item['id']);
            if ($a != null)
                $a->update($item);
            else
                $a = $parentdb->files()->create($item);

            Log::debug("contract_id".$id." itemid ".$a->id);

            $num += 10;
        }
    }

    public function removeFilesListItem($parentdb,$id=-1)
    {
        $items = $parentdb->files()->get();

        foreach($items as $xid)
            $parentdb->files()->find($xid->id)->delete;
    }

    public function viewFilesListItem($key)
    {
        $f = $this->files_record[$key];
        $name = explode('/',$f['file'])[1];
        $ext = explode('.',$name)[1];
        if ($ext == 'pdf')
            $this->viewPDFUrl = URL::to(asset('pdfjs/web/viewer.html')).'?file='.URL::to('/storage/'.$name);
        else
            $this->viewPDFUrl = URL::to('/storage/'.$name);

        Log::debug($this->viewPDFUrl);
        $this->viewPDF = true;
    }

    public function saveFileItem()
    {

        $this->validate([
            'cur_file.name' => 'required',
            'tmp_uploadfile' => 'required|mimes:jpg,bmp,png,pdf',
        ]);

        $this->cur_file['origin_name'] = $this->tmp_uploadfile->getClientOriginalName();
        $this->cur_file['file'] = $this->tmp_uploadfile->store('files');

        array_push($this->files_record,$this->cur_file);

        $this->editFileItemDialog = false;

    }
}
