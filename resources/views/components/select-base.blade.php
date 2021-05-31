<div>

    @if ($label)
        <x-jet-label for="{{$name}}" value="{{ $label }}" />
    @endif

    <div wire:ignore>
        <select
            {{ $attributes->merge(['class' => 'form-control select2 rounded' ]) }}
            {{ $attributes->whereStartsWith('wire:model') }}
            id='{{$name}}'
        >
            <option value="">Choose Person</option>
            @if ($options)
            @foreach($options as $key => $data)
                <option value="{{ $key }}">{{ $data }}</option>
            @endforeach
            @endif
        </select>
    </div>

</div>

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
