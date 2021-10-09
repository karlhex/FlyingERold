<x-app-list-items headers='{{ __("options.key") }} {{__("options.option")}} {{__("options.value") }}'
                  filters="li_filters.key li_filters.option li_filters.value"
                  columns="key option value"
                  :items="$data">

    <x-slot name='input'>
        <x-label-input name="li_record.key" label='{{__("Option.Key")}}' class="mt-2 w-full" wire:model.defer='li_record.key' />
        <x-label-input name="li_record.option" label='{{__("Option.Option")}}' class="mt-2 w-full" wire:model.defer='li_record.option' />
        <x-label-input name="li_record.value" label='{{__("Option.Value")}}' class="mt-2 w-full" wire:model.defer='li_record.value' />
    </x-slot>

    <x-slot name="message">
        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
    </x-slot>

</x-app-list-items>
