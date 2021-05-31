    {{-- Sop Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editCerDialog' wire:model="editCerDialog">
        <x-slot name="title">
            {{ __('Work Experience Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-label-input name="certificate.cer_name" label='{{__("certificate.CerName")}}' class="mt-2 w-full" wire:model.defer='cur_record.cer_name' />
            <x-date-picker name="certificate.cer_date" label='{{__("certificate.CerDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.cer_date' />
            <x-label-input name="certificate.cer_source" label='{{__("certificate.CerSource")}}' class="mt-2 w-full" wire:model.defer='cur_record.cer_source' />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editCerDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveCer" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
