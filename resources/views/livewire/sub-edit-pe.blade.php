<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-date-picker name="cur_record.data.start_date" label='{{__("project_experience.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.start_date' />
            <x-date-picker name="cur_record.data.end_date" label='{{__("project_experience.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.end_date' />
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.project" label='{{__("project_experience.project")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.project' />
            <x-label-input name="cur_record.data.role" label='{{__("project_experience.role")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.role' />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
