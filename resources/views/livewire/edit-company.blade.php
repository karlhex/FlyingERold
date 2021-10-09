<x-edit-page >
    <div class='w-full grid grid-cols-2'>
        <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.name" label='{{__("company.name")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.name' />
            <x-label-input name="edit_page_data.data.address" label='{{__("company.address")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.address' />
            <x-label-input name="edit_page_data.data.phone" label='{{__("company.phone")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.phone' />
            <x-label-input name="edit_page_data.data.email" label='{{__("company.email")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.email' />
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.site" label='{{__("company.site")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.site' />
            <x-select-person name="edit_page_data.data.business_person"  class="mt-2 w-full" label='{{ __("company.BusinessPerson") }}' wire:model.debounce.800ms="edit_page_data.data.business_person" />
            <x-select-person name="edit_page_data.data.tech_person"  class="w-full" label='{{ __("company.TechPerson") }}' wire:model="edit_page_data.data.tech_person" />
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
