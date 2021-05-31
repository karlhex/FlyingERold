<x-app-list-items headers='{{ __("company.name") }} {{__("company.address")}} {{__("company.phone") }} {{ __("company.email") }} {{__("company.site")}}'
                  filters="li_filters.name li_filters.address li_filters.phone li_filters.email li_filters.site"
                  columns="name address phone email site"
                  :items="$data">

    <x-slot name='input'>
        <x-label-input name="company.name" label='{{__("company.name")}}' class="mt-2 w-full" wire:model.defer='li_record.name' />
        <x-label-input name="company.address" label='{{__("company.address")}}' class="mt-2 w-full" wire:model.defer='li_record.address' />
        <x-label-input name="company.phone" label='{{__("company.phone")}}' class="mt-2 w-full" wire:model.defer='li_record.phone' />
        <x-label-input name="company.email" label='{{__("company.email")}}' class="mt-2 w-full" wire:model.defer='li_record.email' />
        <x-label-input name="company.site" label='{{__("company.site")}}' class="mt-2 w-full" wire:model.defer='li_record.site' />
        <x-select-person name="li_record.business_person"  class="w-full" label='{{ __("company.BusinessPerson") }}' wire:model="li_record.business_person" />
        <x-select-person name="li_record.tech_person"  class="w-full" label='{{ __("company.TechPerson") }}' wire:model="li_record.tech_person" />
    </x-slot>

    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>

