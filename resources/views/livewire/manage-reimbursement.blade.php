<x-app-list-items headers='{{__("reimbursement.apply_employee")}} {{__("reimbursement.apply_date") }} {{ __("reimbursement.approve_employee") }} {{__("reimbursement.status")}}'
                  filters="li_filters.apply_employee li_filters.apply_date li_filters.approve_employee li_filters.status"
                  columns="apply_name apply_date approve_name status"
                  url='edit-reimbursement'
                  urlcolumn='apply_date'
                  deletable='false'
                  :items="$data">

    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>

