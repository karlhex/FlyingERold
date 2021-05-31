    {{-- Sop Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editWEDialog' wire:model="editWEDialog">
        <x-slot name="title">
            {{ __('Work Experience Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-date-picker name="work_experience.start_date" label='{{__("work_experience.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.start_date' tabindex=31/>
            <x-date-picker name="work_experience.end_date" label='{{__("work_experience.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.end_date' tabindex=32/>
            <x-label-input name="work_experience.company" label='{{__("work_experience.company")}}' class="mt-2 w-full" wire:model.defer='cur_record.company' tabindex=33/>
            <x-label-input name="work_experience.department" label='{{__("work_experience.department")}}' class="mt-2 w-full" wire:model.defer='cur_record.department' tabindex=34/>
            <x-label-input name="work_experience.position" label='{{__("work_experience.position")}}' class="mt-2 w-full" wire:model.defer='cur_record.position' tabindex=35 />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editWEDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="saveWE" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
