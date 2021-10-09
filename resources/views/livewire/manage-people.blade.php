<x-app-list-items headers='{{ __("people.name") }} {{__("people.company_name")}} {{__("people.department") }} {{__("people.phone1")}} {{ __("people.email") }}'
                  filters="li_filters.name li_filters.company_name li_filters.department li_filters.phone1 filters.email"
                  columns="name company_name department phone1 email"
                  deletable='false'
                  url='edit-person'
                  :items="$data">

    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>

