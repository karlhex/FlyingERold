<x-app-list-items headers='{{ __("productinfo.name") }} {{__("productinfo.company_name")}} {{__("productinfo.unit") }} {{ __("productinfo.type") }}'
                  filters="li_filters.name li_filters.company_name li_filters.unit li_filters.type"
                  columns="name company_name unit type"
                  url='edit-product-info'
                  urlcolumn='name'
                  deletable='false'
                  :items="$data">


    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>

