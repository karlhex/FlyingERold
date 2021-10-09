<x-select-base name="{{$name}}"
               label="{{$label}}"
               key="{{$key}}"
               caption="Choose Option"
               {{ $attributes }}
>
        @foreach ($options as $option)
            <option value="{{$option['option']}}"> {{$option['value'] }}</option>
        @endforeach
</x-select-base>
