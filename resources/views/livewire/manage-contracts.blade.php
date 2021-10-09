<div class='flex flex-shrink flex-col'>
    <div>
        <div class='block w-full p-6 justfy-end'>
            <x-jet-button wire:click="$toggle('enableFilter')">
                {{ __('Filter') }}
            </x-jet-button>
        </div>

        @if ($enableFilter)
            <div class='flex w-full block grid grid-cols-5 px-6 py-3'>
                <x-select-from-model name="filter.type" label='{{ __("Contract.Type") }}' key="contracttype" class="mt-2 w-full" wire:model.defer='filter.type' />
                <x-label-input name="filter.amount_low" label='{{__("Contract.AmountLow")}}' class="mt-2 w-full" wire:model.defer='filter.amount_low' />
                <x-label-input name="filter.amount_high" label='{{__("Contract.AmountHigh")}}' class="mt-2 w-full" wire:model.defer='filter.amount_high' />
                <x-date-picker name="filter.start_date" label='{{__("Contract.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='filter.start_date' />
                <x-date-picker name="filter.end_date" label='{{__("Contract.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='filter.end_date' />
            </div>
        @endif
    </div>

    <div>
    <x-app-list-items headers='{{ __("contract.sid") }} {{__("contract.title")}} {{__("contract.amount") }} {{ __("contract.SignDate") }} {{ __("contract.stage")  }} {{__("contract.company")}}'
                  columns="sid title amount sign_date stage_name company_name"
                  filters='li_filters.sid li_filters.title li_filters.amount li_filters.sign_date li_filters.stage_name li_filters.company_name'
                  url='edit-contract'
                  urlcolumn='sid'
                  deletable='false'
                  :items="$data">
    </x-app-list-items>
    </div>

</div>
