    {{-- Product Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editFileItemDialog' wire:model="editFileItemDialog">
        <x-slot name="title">
            {{ __('File Upload Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-label-input name="cur_file.name" label='{{__("files.name")}}' class="mt-2 w-full" wire:model.defer='cur_file.name' />
            <x-uploader name="tmp_uploadfile" label='{{__("files.File")}}' class="w-full" wire:model="tmp_uploadfile" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editFileItemDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveFileItem" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

