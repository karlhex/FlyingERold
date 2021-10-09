<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.instruction" label='{{__("plan.instruction")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.instruction' />
            <x-select-employee name="cur_record.data.charge_person"  class="mt-2 w-full" label='{{ __("plan.ChargePerson") }}' wire:model.debounce.800ms="cur_record.data.charge_person" />
            <x-date-picker name="cur_record.data.start_date" label='{{__("plan.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.start_date'  tabindex=7/>
            <x-date-picker name="cur_record.data.end_date" label='{{__("plan.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.end_date'  tabindex=7/>
        </div>
        <div class='col-span-1 px-4'>
            <x-select-employee name="cur_record.data.action_person"  class="mt-2 w-full" label='{{ __("plan.ActionPerson") }}' wire:model.debounce.800ms="cur_record.data.action_person" />
            <x-date-picker name="cur_record.data.act_start_date" label='{{__("plan.ActStartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.act_start_date'  tabindex=7/>
            <x-date-picker name="cur_record.data.act_end_date" label='{{__("plan.ActEndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.act_end_date'  tabindex=7/>
            <x-select-from-model name="cur_record.data.status" label='{{ __("plan.PlanStatus") }}' key="planstatus" class="mt-2 w-full" wire:model.defer='cur_record.data.status' />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
