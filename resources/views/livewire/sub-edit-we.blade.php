<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-date-picker name="cur_record.data.start_date" label='{{__("work_experience.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.start_date' tabindex=31/>
            <x-date-picker name="cur_record.data.end_date" label='{{__("work_experience.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.end_date' tabindex=32/>
            <x-label-input name="cur_record.data.company" label='{{__("work_experience.company")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.company' tabindex=33/>
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.department" label='{{__("work_experience.department")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.department' tabindex=34/>
            <x-label-input name="cur_record.data.position" label='{{__("work_experience.position")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.position' tabindex=35 />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
