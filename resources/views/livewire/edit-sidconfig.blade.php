<x-edit-page >
    <div class='w-full grid grid-cols-2'>
        <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.key" label='{{__("sid.key")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.key' />
            <x-label-input name="edit_page_data.data.prefix" label='{{__("sid.prefix")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.prefix' />
            <x-jet-label for="check" value="{{ __('sid.time') }}" />
            <div>
                Year:<x-jet-checkbox name="edit_page_data.data.inc_year" wire:model.defer="edit_page_data.data.inc_year" />
                Month:<x-jet-checkbox name="edit_page_data.data.inc_month" wire:model.defer="edit_page_data.data.inc_month" />
                Day:<x-jet-checkbox name="edit_page_data.data.inc_day" wire:model.defer="edit_page_data.data.inc_day" />
            </div>
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="edit_page_data.data.length" label='{{__("sid.Length")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.length' />
            <x-label-input name="edit_page_data.data.current_no" label='{{__("sid.CurrentNo")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.current_no' />
            <x-label-input name="edit_page_data.data.max_no" label='{{__("sid.MaxNo")}}' class="mt-2 w-full" wire:model.defer='edit_page_data.data.max_no' />
            <x-select-from-model name="edit_page_data.data.clear_interval" label='{{ __("sid.ClearInterval") }}' key="clearinterval" class="mt-2 w-full" wire:model.defer='edit_page_data.data.clear_interval' />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>

        <x-jet-danger-button wire:click='delete'>
            {{ __('Delete') }}
        </x-jet-danger-button>
    </div>

    <div>
        @include('modal.message-dialog')
    </div>
</x-edit-page>
