    {{-- Sop Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editSopDialog' wire:model="editSopDialog">
        <x-slot name="title">
            {{ __('Sop Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-label-input name="cur_record.instruction" label='{{__("sop.instruction")}}' class="mt-2 w-full" wire:model.defer='cur_record.instruction' />
            <x-select-from-model name="cur_record.drcr" label='{{ __("sop.drcr") }}' key="drcr" class="w-full" wire:model.defer='cur_record.drcr' />
            <x-label-input name="cur_record.amount" label='{{__("sop.amount")}}' class="mt-2 w-full" wire:model.defer='cur_record.amount' />
            <x-date-picker name="cur_record.schedule_date" label='{{__("Contract.scheduledate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.schedule_date' />
            <x-date-picker name="cur_record.tran_date" label='{{__("Contract.trandate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.tran_date' />
            <x-label-input name="cur_record.memo" label='{{__("sop.memo")}}' class="mt-2 w-full" wire:model.defer='cur_record.memo' />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editSopDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveSop" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
