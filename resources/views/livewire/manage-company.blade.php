<x-app-list-items headers='{{ __("company.name") }} {{__("company.address")}} {{__("company.phone") }} {{ __("company.email") }} {{__("company.site")}}'
                  filters="li_filters.name li_filters.address li_filters.phone li_filters.email li_filters.site"
                  columns="name address phone email site"
                  url='edit-company'
                  urlcolumn='name'
                  deletable='false'
                  :items="$data">


    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>

