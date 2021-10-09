<x-edit-page >
    <div >
        <div >
            <div class='grid grid-cols-2 w-full border border-blue-200 p-4'>
                <div class='col-span-1 px-4'>
                    <x-edit-sid name="edit_page_data.data.employee_sid" key="employee" label='{{__("Employee.EmployeeSid")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.employee_sid' tabindex=1 />
                    <x-label-input name="edit_page_data.data.name" label='{{__("Employee.Name")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.name' tabindex=2/>
                    <x-label-input name="national_id" label='{{__("Employee.NationalID")}}' class="mt-2 w-full" wire:model.defer='national_id' tabindex=2/>

                    <x-select-from-model name="edit_page_data.data.sex" label='{{ __("Employee.Sex") }}' key="sex" class="mt-2 w-full" wire:model.defer='edit_page_data.data.sex' tabindex=3/>

                    <x-date-picker name="edit_page_data.data.birthday" label='{{__("Employee.Birthday") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.birthday' tabindex=4/>
                    <x-label-input name="edit_page_data.data.origin_city" label='{{__("Employee.OriginCity")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.origin_city' tabindex=5/>
                    <x-label-input name="edit_page_data.data.resident_city" label='{{__("Employee.ResidentCity")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.resident_city' tabindex=5/>
                    <x-label-input name="edit_page_data.data.ethnic" label='{{__("Employee.Ethnic")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.ethnic' tabindex=6 />

                    <x-select-from-model name="edit_page_data.data.department" label='{{ __("Employee.Department") }}' key="department" class="mt-2 w-full" wire:model.defer='edit_page_data.data.department' tabindex=7/>
                    <x-select-from-model name="edit_page_data.data.role" label='{{ __("Employee.Role") }}' key="role" class="mt-2 w-full" wire:model.defer='edit_page_data.data.role' tabindex=8/>
                    <x-label-input name="edit_page_data.data.level" label='{{__("Employee.Level")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.level' tabindex=6 />

                    <x-date-picker name="edit_page_data.data.sign_date" label='{{__("Employee.SignDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.sign_date' tabindex=9/>
                    <x-date-picker name="edit_page_data.data.join_date" label='{{__("Employee.JoinDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.join_date' tabindex=10/>
                </div>
                <div class='col-span-1 px-4'>
                    <x-select-from-model name="edit_page_data.data.sign_type" label='{{ __("Employee.SignType") }}' key="signtype" class="mt-2 w-full" wire:model.defer='edit_page_data.data.sign_type' tabindex=11/>
                    <x-label-input name="edit_page_data.data.sign_duration" label='{{__("Employee.SignDuration")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.sign_duration' tabindex=12/>
                    <x-label-input name="edit_page_data.data.phone" label='{{__("Employee.Phone")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.phone' tabindex=13/>
                    <x-date-picker name="edit_page_data.data.work_date" label='{{__("Employee.WorkDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='edit_page_data.data.work_date' tabindex=14/>
                    <x-label-input name="edit_page_data.data.address" label='{{__("Employee.Address")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.address' tabindex=15/>
                    <x-label-input name="edit_page_data.data.emergency_person" label='{{__("Employee.EmergencyPerson")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.emergency_person' tabindex=16/>
                    <x-label-input name="edit_page_data.data.emergency_phone" label='{{__("Employee.EmergencyPhone")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.emergency_phone' tabindex=17/>
                    <x-label-input name="edit_page_data.data.email" label='{{__("Employee.Email")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.email' tabindex=18/>
                    <x-label-input name="edit_page_data.data.bank" label='{{__("Employee.bank")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.bank' tabindex=19/>
                    <x-label-input name="edit_page_data.data.account" label='{{__("Employee.account")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.account' tabindex=20/>
                    <x-label-input name="edit_page_data.data.si_city" label='{{__("Employee.SiCity")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.si_city' tabindex=21/>
                    <x-label-input name="edit_page_data.data.pf_account" label='{{__("Employee.pfaccount")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.pf_account' tabindex=22/>

                    <x-select-user name="user_id"  class="w-full" label='{{ __("Employee.User") }}' wire:model="user_id"  tabindex=23/>
                </div>
            </div>

            <x-table-list name="work_experience"
                          label='{{__("Employee.WorkExperience")}}'
                          headers='{{__("work_experience.start_date")  }} {{ __("work_experience.end_date") }} {{ __("work_experience.company") }} {{ __("work_experience.department") }} {{ __("work_experience.position") }}'
                          columns="start_date end_date company department position"
                          :items="$mlm_record['work_experience']['record']" />

            <x-table-list name="project_experience"
                          label='{{__("Employee.ProjectExperience")}}'
                          headers='{{__("project_experience.start_date")  }} {{ __("project_experience.end_date") }} {{ __("project_experience.project") }} {{ __("project_experience.role") }}'
                          columns="start_date end_date project role"
                          :items="$mlm_record['project_experience']['record']" />

            <x-table-list name="education"
                          label='{{__("Employee.Education")}}'
                          headers='{{__("education.start_date")  }} {{ __("education.end_date") }} {{ __("education.school") }} {{ __("education.degree") }}'
                          columns="start_date end_date school degree"
                          :items="$mlm_record['education']['record']" />

            <x-table-list name="certificate"
                          label='{{__("Employee.certificate")}}'
                          headers='{{__("certificate.cer_name")  }} {{ __("certificate.cer_date") }} {{ __("certificate.cer_source") }}'
                          columns="cer_name cer_date cer_source"
                          :items="$mlm_record['certificate']['record']" />

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
