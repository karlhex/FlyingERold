<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-date-picker name="cur_record.data.start_date" label='{{__("education.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.start_date' />
            <x-date-picker name="cur_record.data.end_date" label='{{__("education.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.end_date' />
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.school" label='{{__("education.school")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.school' />
            <x-label-input name="cur_record.data.degree" label='{{__("education.degree")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.degree' />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
