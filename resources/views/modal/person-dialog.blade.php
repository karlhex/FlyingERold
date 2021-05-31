    {{-- Person Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editPersonDialog' wire:model="editPersonDialog">
        <x-slot name="title">
            {{ __('Person Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-label-input name="person.name" label='{{__("Person.Name")}}' class="mt-2 w-full" wire:model.defer='person.name' />
            <x-label-input name="person.phone1" label='{{__("Person.Phone1")}}' class="mt-2 w-full" wire:model.defer='person.phone1' />
            <x-label-input name="person.phone2" label='{{__("Person.Phone2")}}' class="mt-2 w-full" wire:model.defer='person.phone2' />
            <x-label-input name="person.phone3" label='{{__("Person.Phone1")}}' class="mt-2 w-full" wire:model.defer='person.phone3' />
            <x-label-input name="person.email" label='{{__("Person.Email")}}' class="mt-2 w-full" wire:model.defer='person.email' />
            <x-label-input name="person.company_name" label='{{__("Person.CompanyName")}}' class="mt-2 w-full" wire:model.defer='person.company_name' />
            <x-label-input name="person.department" label='{{__("Person.Department")}}' class="mt-2 w-full" wire:model.defer='person.department' />
            <x-label-input name="person.title" label='{{__("Person.Title")}}' class="mt-2 w-full" wire:model.defer='person.title' />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editPersonDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="savePerson" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>

            @isset($deleteInDialog)
            <x-jet-danger-button class="ml-2" wire:click="deletePerson" wire:loading.attr="disabled">
                {{ __('Delete Page') }}
            </x-jet-danger-button>
            @endisset
        </x-slot>
    </x-jet-dialog-modal>
