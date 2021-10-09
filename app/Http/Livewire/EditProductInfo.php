<?php

namespace App\Http\Livewire;

use App\Models\ProductInfo;
use Livewire\Component;
use App\Traits\WithEditPage;
use App\Traits\WithEditSessions;

class EditProductInfo extends Component
{

    use WithEditPage;
    use WithEditSessions;

    public $rules = [
        'edit_page_data.data.name' => 'required',
        'edit_page_data.data.company_name' => 'required',
        'edit_page_data.data.type' => 'required',
        'edit_page_data.data.unit' => 'required',
    ];

    /**
     * 网页刷新时，运行
     *
     *  @return void
     */
    public function mount($xid = 0){

        $this->setEditPageModel(ProductInfo::class);

        $this->pushSessionPath('edit-product-info',__("EditProductInfo"), route('dialog',['dialog'=> 'edit-product-info','id' => 0]));

        $this->getEditPageData($xid ,
                               [
                                   "id" => null,
                                   "name" => null,
                                   "company_name" => null,
                                   "unit" => null,
                                   "type" => null,
                                   "description" => null,
                               ]
        );

    }

    public function save(){

        $this->validate();

        $this->saveEditPage();

        $this->returnToParent();
    }

    public function delete()
    {
        $id = $this->edit_page_data['data']['id'];

        if ($id <= 0)
            $this->returnToParent();
        else
        {
            $this->removeEditPage();

            $this->returnToParent();
        }

    }

    public function render()
    {
        return view('livewire.edit-product-info'
        );
    }
}
