<div class='p-6 bg-white'>
    <div >
        <div >
            <div class='grid grid-cols-2 w-full border border-blue-200 p-4'>
                <div class='col-span-1 px-4'>
                    <x-label-input name="employee.employee_sid" label='{{__("Employee.EmployeeSid")}}' class="mt-2 w-full" wire:model.defer='employee.employee_sid' tabindex=1/>
                    <x-label-input name="employee.name" label='{{__("Employee.Name")}}' class="mt-2 w-full" wire:model.defer='employee.name' tabindex=2/>
                    <x-label-input name="employee.national_id" label='{{__("Employee.NationalID")}}' class="mt-2 w-full" wire:model.defer='employee.national_id' tabindex=2/>

                    <x-select-from-model name="employee.sex" label='{{ __("Employee.Sex") }}' key="sex" class="mt-2 w-full" wire:model.defer='employee.sex' tabindex=3/>

                    <x-date-picker name="employee.birthday" label='{{__("Employee.Birthday") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='employee.birthday' tabindex=4/>
                    <x-label-input name="employee.origin_city" label='{{__("Employee.OriginCity")}}' class="mt-2 w-full" wire:model.defer='employee.origin_city' tabindex=5/>
                    <x-label-input name="employee.resident_city" label='{{__("Employee.ResidentCity")}}' class="mt-2 w-full" wire:model.defer='employee.resident_city' tabindex=5/>
                    <x-label-input name="employee.ethnic" label='{{__("Employee.Ethnic")}}' class="mt-2 w-full" wire:model.defer='employee.ethnic' tabindex=6 />

                    <x-select-from-model name="employee.department" label='{{ __("Employee.Department") }}' key="department" class="mt-2 w-full" wire:model.defer='employee.department' tabindex=7/>
                    <x-select-from-model name="employee.role" label='{{ __("Employee.Role") }}' key="role" class="mt-2 w-full" wire:model.defer='employee.role' tabindex=8/>
                    <x-label-input name="employee.level" label='{{__("Employee.Level")}}' class="mt-2 w-full" wire:model.defer='employee.level' tabindex=6 />

                    <x-date-picker name="employee.sign_date" label='{{__("Employee.SignDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='employee.sign_date' tabindex=9/>
                    <x-date-picker name="employee.join_date" label='{{__("Employee.JoinDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='employee.join_date' tabindex=10/>
                </div>
                <div class='col-span-1 px-4'>
                    <x-select-from-model name="employee.sign_type" label='{{ __("Employee.SignType") }}' key="signtype" class="mt-2 w-full" wire:model.defer='employee.sign_type' tabindex=11/>
                    <x-label-input name="employee.sign_duration" label='{{__("Employee.SignDuration")}}' class="mt-2 w-full" wire:model.defer='employee.sign_duration' tabindex=12/>
                    <x-label-input name="employee.phone" label='{{__("Employee.Phone")}}' class="mt-2 w-full" wire:model.defer='employee.phone' tabindex=13/>
                    <x-date-picker name="employee.work_date" label='{{__("Employee.WorkDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='employee.work_date' tabindex=14/>
                    <x-label-input name="employee.address" label='{{__("Employee.Address")}}' class="mt-2 w-full" wire:model.defer='employee.address' tabindex=15/>
                    <x-label-input name="employee.emergency_person" label='{{__("Employee.EmergencyPerson")}}' class="mt-2 w-full" wire:model.defer='employee.emergency_person' tabindex=16/>
                    <x-label-input name="employee.emergency_phone" label='{{__("Employee.EmergencyPhone")}}' class="mt-2 w-full" wire:model.defer='employee.emergency_phone' tabindex=17/>
                    <x-label-input name="employee.email" label='{{__("Employee.Email")}}' class="mt-2 w-full" wire:model.defer='employee.email' tabindex=18/>
                    <x-label-input name="employee.bank" label='{{__("Employee.bank")}}' class="mt-2 w-full" wire:model.defer='employee.bank' tabindex=19/>
                    <x-label-input name="employee.account" label='{{__("Employee.account")}}' class="mt-2 w-full" wire:model.defer='employee.account' tabindex=20/>
                    <x-label-input name="employee.si_city" label='{{__("Employee.SiCity")}}' class="mt-2 w-full" wire:model.defer='employee.si_city' tabindex=21/>
                    <x-label-input name="employee.pf_account" label='{{__("Employee.pfaccount")}}' class="mt-2 w-full" wire:model.defer='employee.pf_account' tabindex=22/>
                </div>
            </div>

            <x-table-list name="work_experience"
                          label='{{__("Employee.WorkExperience")}}'
                          headers='{{__("work_experience.start_date")  }} {{ __("work_experience.end_date") }} {{ __("work_experience.company") }} {{ __("work_experience.department") }} {{ __("work_experience.position") }}'
                          columns="start_date end_date company department position"
                          :items="$mlm_record['work_experience']" />

            <x-table-list name="project_experience"
                          label='{{__("Employee.ProjectExperience")}}'
                          headers='{{__("project_experience.start_date")  }} {{ __("project_experience.end_date") }} {{ __("project_experience.project") }} {{ __("project_experience.role") }}'
                          columns="start_date end_date project role"
                          :items="$mlm_record['project_experience']" />

            <x-table-list name="education"
                          label='{{__("Employee.Education")}}'
                          headers='{{__("education.start_date")  }} {{ __("education.end_date") }} {{ __("education.school") }} {{ __("education.degree") }}'
                          columns="start_date end_date school degree"
                          :items="$mlm_record['education']" />

            <x-table-list name="certificate"
                          label='{{__("Employee.certificate")}}'
                          headers='{{__("certificate.cer_name")  }} {{ __("certificate.cer_date") }} {{ __("certificate.cer_source") }}'
                          columns="cer_name cer_date cer_source"
                          :items="$mlm_record['certificate']" />

        </div>

        <br>

        <div>
            <x-jet-button wire:click='save'>
                {{ __('Save') }}
            </x-jet-button>

            <x-jet-danger-button wire:click='deleteEmployee'>
                {{ __('Delete') }}
            </x-jet-danger-button>

            <x-jet-button wire:click='uploadEmployeeFiles'>
                {{ __('Files') }}
            </x-jet-button>
        </div>

    </div>

    <div>
        @include('modal.we-dialog')
        @include('modal.pe-dialog')
        @include('modal.edu-dialog')
        @include('modal.cer-dialog')
        @include('modal.message-dialog')
    </div>
</div>
