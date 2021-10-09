<x-edit-page parent="{{route('frame', ['frame' => 'manage-contracts'] )}}">
    <div class='w-full grid grid-cols-2'>
        <div class='col-span-1 px-4'>
        <x-label-input name="edit_page_data.data.name" label='{{__("people.name")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.name' />
        <x-label-input name="edit_page_data.data.company_name" label='{{__("people.company_name")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.company_name' />
        <x-label-input name="edit_page_data.data.department" label='{{__("people.department")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.department' />
        <x-label-input name="edit_page_data.data.position" label='{{__("people.position")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.position' />
        </div>
        <div class='col-span-1 px-4'>
        <x-label-input name="edit_page_data.data.phone1" label='{{__("people.phone1")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.phone1' />
        <x-label-input name="edit_page_data.data.phone2" label='{{__("people.phone2")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.phone2' />
        <x-label-input name="edit_page_data.data.phone3" label='{{__("people.phone3")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.phone3' />
        <x-label-input name="edit_page_data.data.email" label='{{__("people.email")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.email' />
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
