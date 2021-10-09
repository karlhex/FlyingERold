<div class="flex flex-shrink flex-col w-full">

    <x-app-list-items headers='{{ __("employee.employee_sid") }} {{__("employee.title")}} {{__("employee.department") }} {{ __("employee.Role") }} {{__("employee.phone")}}'
                  filters="li_filters.employee_sid li_filters.name li_filters.department li_filters.role li_filters.phone"
                  columns="employee_sid name department role phone"
                  url='edit-employee'
                  urlcolumn='employee_sid'
                  deletable='false'
                  :items="$data">
    </x-app-list-items>

</div>
