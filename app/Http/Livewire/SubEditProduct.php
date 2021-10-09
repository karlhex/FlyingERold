<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\ProductInfo;
use App\Traits\WithEditSessions;

class SubEditProduct extends Component
{

    use WithEditSessions;

    /**
     *  以下主要是需要update的数据。
     */
    public $cur_record;

    public $pinfo;

    public $product_name;
    public $description;
    public $company_name;
    public $unit;

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount(){
        $this->cur_record = $this->restoreSubEditSession();

        $this->pinfo = $this->cur_record['data']['productinfo_id'];
        $this->updatedpinfo();
        $this->pushSessionPath('sub-edit-product',__("SubEditProduct"),route('dialog',['dialog'=> 'sub-edit-product','id' => 0]));

    }

    public function save(){

        $this->saveSubEditSession($this->cur_record);

        session()->flash('message','Product has been updated...');

        $this->returnToParent();

    }

    public function updatedpinfo()
    {
        $this->cur_record['data']['productinfo_id'] = $this->pinfo;
        $obj = ProductInfo::where('id',$this->pinfo)->first();

        if ($obj == null)
            return ;

        $this->cur_record['data']['product_name'] = $obj->name;

        $this->product_name = $this->cur_record['data']['product_name'];

        $this->company_name = $obj->company_name;
        $this->description = $obj->description;
        $this->unit = $obj->unit;

        Log::debug('pinfo updated...');
    }

    public function render()
    {
        return view('livewire.sub-edit-product'
        );
    }
}
