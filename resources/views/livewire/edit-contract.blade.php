<x-edit-page parent="{{route('frame',['frame' => 'manage-contracts'])}}">
    <div >
        <div >
            <div class='grid grid-cols-2 border border-blue-200 p-4'>
                <div class='col-span-1 px-4'>
            <x-edit-sid name="edit_page_data.data.sid" key="contract" label='{{__("contract.Sid")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.sid' tabindex=1 />
            <x-label-input name="edit_page_data.data.title" label='{{__("Contract.Title")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.title' tabindex=2 />
            <x-select-project name="edit_page_data.data.project_id"  class="w-full" label='{{ __("Contract.Project") }}' wire:model="edit_page_data.data.project_id"  tabindex=3/>
            <x-select-company name="edit_page_data.data.company_id"  class="w-full" label='{{ __("Contract.Company") }}' wire:model="edit_page_data.data.company_id"  tabindex=3/>
            <x-select-from-model name="edit_page_data.data.type" label='{{ __("Contract.Type") }}' key="contracttype" class="w-full" wire:model.defer='edit_page_data.data.type'  tabindex=4/>
            <x-select-from-model name="edit_page_data.data.stage" label='{{ __("Contract.Stage") }}' key="contractstage" class="w-full" wire:model.defer='edit_page_data.data.stage'  tabindex=5/>
                </div>
                <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.amount" label='{{__("Contract.Amount")}}' class="mt-2 w-full text-right" wire:model.defer='edit_page_data.data.amount'  tabindex=6/>

            <x-date-picker name="edit_page_data.data.sign_date" label='{{__("Contract.SignDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.sign_date'  tabindex=7/>
            <x-date-picker name="edit_page_data.data.start_date" label='{{__("Contract.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.start_date'  tabindex=8/>
            <x-date-picker name="edit_page_data.data.end_date" label='{{__("Contract.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.end_date'  tabindex=9/>

            <x-select-person name="edit_page_data.data.contact_person"  class="w-full" label='{{ __("Contract.TechPerson") }}' wire:model="edit_page_data.data.contact_person"  tabindex=2/>
                </div>
            </div>

            <x-table-list name="products"
                          label='{{__("Contract.Products")}}'
                          headers='{{__("products.real_name")  }} {{ __("products.model") }} {{ __("products.unit_price") }} {{ __("produts.number") }}'
                          columns="product_name model unit_price number"
                          :items="$mlm_record['products']['record']" />

            <x-table-list name="sops"
                          label='{{__("Contract.Sop")}}'
                          headers='{{__("sop.instruction")  }} {{ __("sop.drcr") }} {{ __("sop.amount") }} {{ __("sop.schedule_date") }} {{ __("sop.tran_date") }}'
                          columns="instruction drcr_name amount schedule_date tran_date"
                          :items="$mlm_record['sops']['record']" />

            <x-files-list name='files' label='{{__("Files")}}' :items="$files_record" />

        </div>

        <br>

        <div>
            <x-jet-button wire:click='save'>
                {{ __('Save') }}
            </x-jet-button>

            <x-jet-danger-button wire:click='delete'>
                {{ __('Delete') }}
            </x-jet-danger-button>
        </div>

    </div>

    <div>
        @include('modal.product-dialog')
        @include('modal.sop-dialog')
        @include('modal.message-dialog')
        @include('modal.edit-file')
        @include('modal.view-frame')
    </div>

</x-edit-page>
