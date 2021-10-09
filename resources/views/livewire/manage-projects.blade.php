<div class="flex flex-shrink flex-col w-full">

    <x-app-list-items headers='{{ __("project.sid") }} {{__("project.name")}} {{__("project.start_date") }} {{ __("project.status") }}'
                  filters="li_filters.sid li_filters.name li_filters.start_date li_filters.status"
                  columns="sid name start_date status_name"
                  url='edit-project'
                  urlcolumn='sid'
                  deletable='false'
                  :items="$data">
    </x-app-list-items>

</div>
