    {{-- Sop Info & Edit Dialog --}}
    <x-jet-dialog-modal id='editPEDialog' wire:model="editPEDialog">
        <x-slot name="title">
            {{ __('Project Experience Dialog') }}
        </x-slot>

        <x-slot name="content">
            <x-date-picker name="cur_record.start_date" label='{{__("project_experience.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.start_date' />
            <x-date-picker name="cur_record.end_date" label='{{__("project_experience.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.end_date' />
            <x-label-input name="cur_record.project" label='{{__("project_experience.project")}}' class="mt-2 w-full" wire:model.defer='cur_record.project' />
            <x-label-input name="cur_record.role" label='{{__("project_experience.role")}}' class="mt-2 w-full" wire:model.defer='cur_record.role' />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editPEDialog')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-secondary-button wire:click="savePE" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
