<div >

    <div class="flex w-full px-10 py-3 block justify-end">
        <x-jet-button ><a target='_blank' href='{{ URL::to('/employee') }}'>{{ __("Add") }} </a></x-jet-button>
    </div>

    <x-app-list-items headers='{{ __("employee.employee_sid") }} {{__("employee.title")}} {{__("employee.department") }} {{ __("employee.Role") }} {{__("employee.phone")}}'
                  filters="li_filters.employee_sid li_filters.name li_filters.department li_filters.role li_filters.phone"
                  columns="employee_sid name department role phone"
                  url='employee'
                  urlcolumn='employee_sid'
                  editable='false'
                  deletable='false'
                  :items="$data">
    </x-app-list-items>

</div>
