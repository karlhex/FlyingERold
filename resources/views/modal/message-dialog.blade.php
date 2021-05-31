    {{-- Confirm Dialog --}}
    <x-jet-dialog-modal wire:model="msgUpdateDialog">
        <x-slot name="title">
            {{ __('Updated') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Record had been updated') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('msgUpdateDialog')" wire:loading.attr="disabled">
                {{ __('OK') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
