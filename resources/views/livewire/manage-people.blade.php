<x-app-list-items headers='{{ __("people.name") }} {{__("people.company_name")}} {{__("people.department") }} {{ __("people.position") }} {{__("people.phone1")}} {{ __("people.email") }}'
                  filters="li_filters.name li_filters.company_name li_filters.department li_filters.position li_filters.phone1 filters.email"
                  columns="name company_name department position phone1 email"
                  :items="$data">

    <x-slot name='input'>
        <x-label-input name="people.name" label='{{__("people.name")}}' class="mt-2 w-full" wire:model.defer='li_record.name' />
        <x-label-input name="people.company_name" label='{{__("people.company_name")}}' class="mt-2 w-full" wire:model.defer='li_record.company_name' />
        <x-label-input name="people.department" label='{{__("people.department")}}' class="mt-2 w-full" wire:model.defer='li_record.department' />
        <x-select-from-model name="people.position" label='{{ __("People.Position") }}' key="position" class="mt-2 w-full" wire:model.defer='li_record.position' />
        <x-label-input name="people.phone1" label='{{__("people.phone1")}}' class="mt-2 w-full" wire:model.defer='li_record.phone1' />
        <x-label-input name="people.phone2" label='{{__("people.phone2")}}' class="mt-2 w-full" wire:model.defer='li_record.phone2' />
        <x-label-input name="people.phone3" label='{{__("people.phone3")}}' class="mt-2 w-full" wire:model.defer='li_record.phone3' />
        <x-label-input name="people.email" label='{{__("people.email")}}' class="mt-2 w-full" wire:model.defer='li_record.email' />
    </x-slot>

    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>

