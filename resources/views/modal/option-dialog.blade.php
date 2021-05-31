    {{-- Person Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editOptionDialog' wire:model="editOptionDialog">
        <x-slot name="title">
            {{ __('Option Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-label-input name="option.key" label='{{__("Option.Key")}}' class="mt-2 w-full" wire:model.defer='option.key' />
            <x-label-input name="option.option" label='{{__("Option.Option")}}' class="mt-2 w-full" wire:model.defer='option.option' />
            <x-label-input name="option.value" label='{{__("Option.Value")}}' class="mt-2 w-full" wire:model.defer='option.value' />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editOptionDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveOption" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>

            @isset($deleteInDialog)
            <x-jet-danger-button class="ml-2" wire:click="deletePerson" wire:loading.attr="disabled">
                {{ __('Delete Page') }}
            </x-jet-danger-button>
            @endisset
        </x-slot>
    </x-jet-dialog-modal>
