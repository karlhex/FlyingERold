<div class='p-6 bg-white'>
    <div >
        <div >
            <div class='grid grid-cols-2 border border-blue-200 p-4'>
                <div class='col-span-1 px-4'>
            <x-label-input name="contract.title" label='{{__("Contract.Title")}}' class="mt-2 w-full" wire:model.defer='contract.title' />
            <x-label-input name="contract.sid" label='{{__("Contract.sid")}}' class="mt-2 w-full" wire:model.defer='contract.sid' />
            <x-select-company name="contract.company_id"  class="w-full" label='{{ __("Contract.Company") }}' wire:model="contract.company_id" />
            <x-select-from-model name="contract.type" label='{{ __("Contract.Type") }}' key="contracttype" class="mt-2 w-full" wire:model.defer='contract.type' />
            <x-select-from-model name="contract.stage" label='{{ __("Contract.Stage") }}' key="contractstage" class="mt-2 w-full" wire:model.defer='contract.stage' />
                </div>
                <div class='col-span-1 px-4'>
            <x-label-input name="contract.amount" label='{{__("Contract.Amount")}}' class="mt-2 w-60 text-right" wire:model.defer='contract.amount' />

            <x-date-picker name="contract.sign_date" label='{{__("Contract.SignDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='contract.sign_date' />
            <x-date-picker name="contract.start_date" label='{{__("Contract.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='contract.start_date' />
            <x-date-picker name="contract.end_date" label='{{__("Contract.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='contract.end_date' />

            <x-select-person name="contract.contact_person"  class="w-full" label='{{ __("Contract.TechPerson") }}' wire:model="contract.contact_person" />
                </div>
            </div>

            <x-table-list name="products"
                          label='{{__("Contract.Products")}}'
                          headers='{{__("products.name")  }} {{ __("products.model") }} {{ __("products.unit") }} {{ __("products.unit_price") }} {{ __("produts.tax_rate") }}'
                          columns="name model unit unit_price tax_rate"
                          :items="$mlm_record['products']" />

            <x-table-list name="sops"
                          label='{{__("Contract.Sop")}}'
                          headers='{{__("sop.instruction")  }} {{ __("sop.drcr") }} {{ __("sop.amount") }} {{ __("sop.schedule_date") }} {{ __("sop.tran_date") }}'
                          columns="instruction drcr amount schedule_date tran_date"
                          :items="$mlm_record['sops']" />

        </div>

        <br>

        <div>
            <x-jet-button wire:click='save'>
                {{ __('Save') }}
            </x-jet-button>

            <x-jet-danger-button wire:click='deleteContract'>
                {{ __('Delete') }}
            </x-jet-danger-button>

            <x-jet-button wire:click='uploadContractFiles'>
                {{ __('Files') }}
            </x-jet-button>
        </div>

    </div>

    <div>
        @include('modal.product-dialog')
        @include('modal.sop-dialog')
        @include('modal.message-dialog')
    </div>
</div>
