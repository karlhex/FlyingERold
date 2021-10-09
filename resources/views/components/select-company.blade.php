<x-select-base name="{{$name}}"
               label="{{$label}}"
               select2=true
               {{ $attributes }}
               caption="Choose Company"
>
            @foreach($options as $key => $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
</x-select-base>
