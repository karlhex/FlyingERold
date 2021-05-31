    {{-- Sop Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editEduDialog' wire:model="editEduDialog">
        <x-slot name="title">
            {{ __('Work Experience Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-date-picker name="education.start_date" label='{{__("education.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.start_date' />
            <x-date-picker name="education.end_date" label='{{__("education.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.end_date' />
            <x-label-input name="education.school" label='{{__("education.school")}}' class="mt-2 w-full" wire:model.defer='cur_record.school' />
            <x-label-input name="education.degree" label='{{__("education.degree")}}' class="mt-2 w-full" wire:model.defer='cur_record.degree' />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editEduDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveEdu" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
