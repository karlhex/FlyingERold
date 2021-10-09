<x-edit-page >
    <div class='w-full grid grid-cols-2'>
        <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.name" label='{{__("productinfo.name")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.name' />
            <x-label-input name="edit_page_data.data.company_name" label='{{__("productinfo.company_name")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.company_name' />
            <x-label-input name="edit_page_data.data.unit" label='{{__("productinfo.unit")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.unit' />
            <x-select-from-model name="edit_page_data.data.type" label='{{ __("productinfo.type") }}' key="producttype" class="mt-2 w-full" wire:model.defer='edit_page_data.data.type' />
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.description" label='{{__("productinfo.description")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.description' />
        </div>
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

    <div>
        @include('modal.message-dialog')
    </div>
</x-edit-page>
