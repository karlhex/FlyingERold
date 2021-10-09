<x-edit-page>
    <div >
        <div >
            <div class='grid grid-cols-2 border border-blue-200 p-4'>
                <div class='col-span-1 px-4'>
            <x-edit-sid name="edit_page_data.data.sid" key="project" label='{{__("Project.Sid")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.sid' tabindex=1 />
            <x-label-input name="edit_page_data.data.name" label='{{__("Project.Name")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.name' tabindex=2 />
                </div>
                <div class='col-span-1 px-4'>
            <x-date-picker name="edit_page_data.data.start_date" label='{{__("Project.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.start_date'  tabindex=3/>
            <x-date-picker name="edit_page_data.data.end_date" label='{{__("Project.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.end_date'  tabindex=4/>
            <x-select-from-model name="edit_page_data.data.status" label='{{ __("Project.Status") }}' key="prjstatus" class="w-full" wire:model.defer='edit_page_data.data.status'  tabindex=5/>
                </div>
            </div>


            <x-table-list name="contracts"
                      label='{{__("Project.Contracts")}}'
                      headers='{{__("contract.sid")  }} {{ __("contract.title") }} {{ __("contract.type") }} {{ __("contract.amount") }}'
                      columns="sid title type_name amount"
                      :editable=false
                      :items="$mlm_record['contracts']['record']" />

            <x-table-list name="plans"
                      label='{{__("Project.Plans")}}'
                      headers='{{__("plan.instruction")  }} {{ __("plan.start_date") }} {{ __("plan.charge_person") }} {{ __("plan.status") }}'
                      columns="instruction start_date charge_person_name status_name"
                      :items="$mlm_record['plans']['record']" />

            <x-files-list name='files' label='{{__("Files")}}' :items="$files_record" />
        </div>
        <br>

        <div>
            <x-jet-button wire:click='save'>
                {{ __('Save') }}
            </x-jet-button>

            <x-jet-danger-button wire:click='delete'>
                {{ __('Delete') }}
            </x-jet-danger-button>
        </div>

    </div>

    <div>
        @include('modal.message-dialog')
        @include('modal.edit-file')
        @include('modal.view-frame')
    </div>

</x-edit-page>
