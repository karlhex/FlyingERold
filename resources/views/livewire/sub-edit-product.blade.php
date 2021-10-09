<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-select-product-info name="pinfo"  class="mt-2 w-full" label='{{ __("product.product") }}' wire:model.debounce.800ms="pinfo" />
            <div>
                <h2>Product Name: {{$product_name}} </h2>
                <h2>Company Name: {{$company_name}} </h2>
                <h2>Unit        : {{$unit}} </h2>
                <h2>Description : {{$description}} </h2>
            </div>
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.model" label='{{__("product.model")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.model' />
            <x-label-input name="cur_record.data.unit_price" label='{{__("product.UnitPrice")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.unit_price' />
            <x-label-input name="cur_record.data.number" label='{{__("product.Number")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.number' />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
