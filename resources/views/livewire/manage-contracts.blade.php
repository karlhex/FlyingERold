<div>

    <div class="flex w-full px-10 py-3 block justify-end">
        <x-jet-button ><a target='_blank' href='{{ URL::to('/contract') }}'>{{ __("Add") }} </a></x-jet-button>
    </div>

    <div class='flex w-full block grid grid-cols-5 px-6 py-3'>
        <x-select-from-model name="filter.type" label='{{ __("Contract.Type") }}' key="contracttype" class="mt-2 w-full" wire:model.defer='filter.type' />
        <x-label-input name="filter.amount_low" label='{{__("Contract.AmountLow")}}' class="mt-2 w-full" wire:model.defer='filter.amount_low' />
        <x-label-input name="filter.amount_high" label='{{__("Contract.AmountHigh")}}' class="mt-2 w-full" wire:model.defer='filter.amount_high' />
        <x-date-picker name="filter.start_date" label='{{__("Contract.StartDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='filter.start_date' />
        <x-date-picker name="filter.end_date" label='{{__("Contract.EndDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='filter.end_date' />
    </div>

    <x-app-list-items headers='{{ __("contract.sid") }} {{__("contract.title")}} {{__("contract.amount") }} {{ __("contract.SignDate") }} {{ __("contract.stage")  }} {{__("contract.company")}}'
                  filters="li_filters.sid li_filters.title li_filters.amount li_filters.sign_date li_filters.stage_name li_filters.company_name"
                  columns="sid title amount sign_date stage_name company_name"
                  url='contract'
                  urlcolumn='sid'
                  editable='false'
                  deletable='false'
                  :items="$data">
    </x-app-list-items>


</div>
