<x-select-base name="{{$name}}"
               label="{{$label}}"
               select2=true
               {{ $attributes }}
               caption="Choose User"
>
            @foreach($options as $key => $data)
                <option value="{{ $data->id }}">{{ $data->name }} * {{ $data->email  }}</option>
            @endforeach
</x-select-base>
