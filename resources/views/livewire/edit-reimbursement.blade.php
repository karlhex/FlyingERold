<x-edit-page >
    <div >
        <div >
            <div class='grid grid-cols-2 border border-blue-200 p-4'>
                <div class='col-span-1 px-4'>
            <x-select-employee name="edit_page_data.data.apply_employee_id"  class="mt-2 w-full" label='{{ __("Reimburesement.ApplyEmployee") }}' wire:model.debounce.800ms="edit_page_data.data.apply_employee_id" />
            <x-date-picker name="edit_page_data.data.apply_date" label='{{__("Reimbursement.ApplyDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.apply_date'  tabindex=7/>
            <x-select-employee disabled name="edit_page_data.data.approve_employee_id"  class="mt-2 w-full" label='{{ __("Reimburesement.ApproveEmployee") }}' wire:model.debounce.800ms="edit_page_data.data.approve_employee_id" />
            <x-date-picker disabled name="edit_page_data.data.approve_date" label='{{__("Reimbursement.ApproveDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.approve_date'  tabindex=7/>
                </div>
                <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.total_amount" label='{{__("Reimbursement.TotalAmount")}}' class="mt-2 w-full text-right" wire:model.defer='edit_page_data.data.total_amount'  tabindex=6/>
            <x-select-from-model disabled name="edit_page_data.data.status" label='{{ __("Reimbursement.Status") }}' key="rbstatus" class="w-full" wire:model.defer='edit_page_data.data.status'  tabindex=4/>
                </div>
            </div>

            <x-table-list name="detail"
                          label='{{__("Reimbursement.Detail")}}'
                          headers='{{__("Reimbursement.date")  }} {{ __("Reimbursement.reason") }} {{ __("Reimbursement.Amount") }} {{ __("Reimbursement.ProjectID") }}'
                          columns="date reason amount project_id"
                          :items="$mlm_record['detail']['record']" />

            <x-files-list name='files' label='{{__("Files")}}' :items="$files_record" />

        </div>

        <br>

        <div>
            <x-jet-button wire:click='save'>
                {{ __('Save') }}
            </x-jet-button>

            <x-jet-button wire:click='approve'>
                {{ __('Approve') }}
            </x-jet-button>

            <x-jet-button wire:click='reject'>
                {{ __('Reject') }}
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
