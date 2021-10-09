<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.reason" label='{{__("Reimbursement.Reason")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.reason' tabindex=1/>
            <x-date-picker name="cur_record.data.date" label='{{__("Reimbursement.RbDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.date'  tabindex=2/>
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.amount" label='{{__("Reimbursement.Amount")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.amount' tabindex=3/>
            <x-select-project name="cur_record.data.project_id"  class="w-full" label='{{ __("Reimbursement.Project") }}' wire:model="cur_record.data.project_id"  tabindex=4/>
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
