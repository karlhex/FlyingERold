<x-edit-page >
   <div class='grid grid-cols-2 border border-blue-200 p-4'>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.cer_name" label='{{__("certificate.CerName")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.cer_name' />
            <x-date-picker name="cur_record.data.cer_date" label='{{__("certificate.CerDate") }}'  class="mt-1 w-full" format="YYYY-MM-DD" wire:model.defer='cur_record.data.cer_date' />
        </div>
        <div class='col-span-1 px-4'>
            <x-label-input name="cur_record.data.cer_source" label='{{__("certificate.CerSource")}}' class="mt-2 w-full" wire:model.defer='cur_record.data.cer_source' />
        </div>
    </div>

    <br>

    <div>
        <x-jet-button wire:click='save'>
            {{ __('Save') }}
        </x-jet-button>
    </div>

</x-edit-page>
