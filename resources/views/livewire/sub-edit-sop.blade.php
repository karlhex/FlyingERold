<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.instruction" label='{{__("sop.instruction")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.instruction' />
            <x-select-from-model name="cur_record.data.drcr" label='{{ __("sop.drcr") }}' key="drcr" class="w-full" wire:model.defer='cur_record.data.drcr' />
            <x-label-input name="cur_record.data.amount" label='{{__("sop.amount")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.amount' />
        </div>
        <div class='col-span-1 px-4'>
            <x-date-picker name="cur_record.data.schedule_date" label='{{__("Contract.scheduledate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.schedule_date' />
            <x-date-picker name="cur_record.data.tran_date" label='{{__("Contract.trandate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.tran_date' />
            <x-label-input name="cur_record.data.memo" label='{{__("sop.memo")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.memo' />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
