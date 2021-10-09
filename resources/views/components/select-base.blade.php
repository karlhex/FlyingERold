@props(['label','name'])

<x-edit-base name="{{$name}}"
             label="{{$label}}"
             {{ $attributes  }}
>

    <div class='w-full' wire:ignore>
        <select
            {{  $attributes->merge(["class" => "form-control $select2 my-2 px-3 py-1 border rounded text-xs text-gray-700 focus:outline-none" ]) }}
            {{ $attributes->whereStartsWith('wire:model') }}
            style="width: 100%"
            id="{{ $name }}"
        >
            @if ($select2)
            <option value="">{{ $caption }}</option>
            @endif

                {{ $slot }}

        </select>
    </div>
</x-edit-base>

@once
    @push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: '{{__('Select your option')}}',
                allowClear: true
            });
            $('.select2').on('change', function (e) {
                let elementName = $(this).attr('id');
                var data = $(this).select2("val");
                @this.set(elementName, data);
            });
        });
    </script>
    @endpush
@endonce
