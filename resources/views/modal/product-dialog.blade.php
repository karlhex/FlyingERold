    {{-- Product Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editProductDialog' wire:model="editProductDialog">
        <x-slot name="title">
            {{ __('Product Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-label-input name="product.name" label='{{__("product.name")}}' class="mt-2 w-full" wire:model.defer='cur_record.name' />
            <x-label-input name="product.model" label='{{__("product.model")}}' class="mt-2 w-full" wire:model.defer='cur_record.model' />
            <x-label-input name="product.unit" label='{{__("product.unit")}}' class="mt-2 w-full" wire:model.defer='cur_record.unit' />
            <x-label-input name="product.unit_price" label='{{__("product.unit_price")}}' class="mt-2 w-full" wire:model.defer='cur_record.unit_price' />
            <x-label-input name="product.number" label='{{__("product.number")}}' class="mt-2 w-full" wire:model.defer='cur_record.number' />
            <x-label-input name="product.tax_rate" label='{{__("product.tax_rate")}}' class="mt-2 w-full" wire:model.defer='cur_record.tax_rate' />
            <x-select-from-model name="product.status" label='{{ __("product.status") }}' key="productstat" class="mt-2 w-full" wire:model.defer='cur_record.status' />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editProductDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveProduct" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
