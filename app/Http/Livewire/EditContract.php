<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use Livewire\Component;
use App\Traits\WithMultiListControl;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class EditContract extends Component
{
    use WithFileUploads;
    use WithMultiListControl;

    protected $fw_contract;

    /**
     *  以下主要是需要update的数据。
     */
    public $contract;

    public $file;

    /**
     * 列表的数据
     */
    public $xcompanies;

    /**
     * 各种id
     */
    public $contract_id;
    public $current_product_id=-1;
    public $current_sop_id=-1;

    public $editProductDialog = false;
    public $editSopDialog = false;
    public $msgUpdateDialog = false;

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($contractid = 0){
        $this->contract_id = $contractid;
        $this->getContract();

        $this->setMultiListItemFromModel($this->fw_contract,
                                         'products',
                                [
                                    'id' =>null,
                                    'name' => null,
                                    'model' => null,
                                    'unit' => null,
                                    'unit_price' => null,
                                    'number' => null,
                                    'tax_rate' => null,
                                    'status' => 'factory',
                                    'license' => null,
                                ]);

        $this->setMultiListItemFromModel($this->fw_contract,
                                         'sops',
                                [
                                    'id' => null,
                                    'contract_id' => null,
                                    'sequence'=> null,
                                    'drcr' => 'Dr',
                                    'instruction' => null,
                                    'amount' => null,
                                    'schedule_date' => null,
                                    'tran_date' => null,
                                    'memo' => null,
                                ]);


    }

    public function save(){
        if ($this->contract['id'])
        {
            $this->fw_contract = Contract::find($this->contract['id']);
            $this->fw_contract->update($this->contract);
        }
        else
        {
            $this->fw_contract = Contract::create($this->contract);

            $this->contract = $this->fw_contract->toArray();
        }

        //$this->saveSops();

        $this->saveMultiListItem($this->fw_contract,$this->contract['id']);

        $this->msgUpdateDialog = true;
    }


    protected function clearContract(){
        $this->contract=[
              "id" => null,
              "project_id" => null,
              "sid" => null,
              "peer_sid" => null,
              "title" => null,
              "company_id" => null,
              "type" => 'puchase',
              "amount" => null,
              "stage" => 'waiting',
              "sign_date" => null,
              "start_date" => null,
              "end_date" => null,
              "contact_person" => null,
        ];
    }

    public function getContract(){
        $this->clearContract();

        if ($this->contract_id){
            $data = Contract::where('id',$this->contract_id)->first();

            $this->fw_contract = $data;

            if ($data)
            {
                $this->contract = $data->toArray();
            }

        }
    }

    public function callMultiListDialog($name,$key)
    {
        switch ($name)
        {
            case 'products':
                $this->current_product_id = $key;
                $this->editProductDialog = true;
                break;
            case 'sops':
                $this->current_sop_id = $key;
                $this->editSopDialog = true;
                break;
        }
    }

    public function saveProduct()
    {

        if ($this->current_product_id < 0 )
            array_push($this->mlm_record['products'],$this->cur_record);
        else
            $this->mlm_record['products'][$this->current_product_id] = $this->cur_record;

        $this->editProductDialog = false;
    }

    public function saveSop()
    {

        if ($this->current_sop_id < 0 )
            array_push($this->mlm_record['sops'],$this->cur_record);
        else
            $this->mlm_record['sops'][$this->current_sop_id] = $this->cur_record;

        $this->editSopDialog = false;
    }

    public function render()
    {
        return view('livewire.edit-contract'
        );
    }
}
