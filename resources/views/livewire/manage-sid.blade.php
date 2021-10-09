<x-app-list-items headers='{{ __("sid.key") }} {{__("sid.prefix")}} {{__("sid.CurrentNo") }} {{ __("sid.ClearInterval") }}'
                  filters="li_filters.key li_filters.prefix li_filters.current_no li_filters.clear_interval"
                  columns="key prefix current_no clear_interval"
                  deletable='false'
                  url='edit-sidconfig'
                  :items="$data">

    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>

