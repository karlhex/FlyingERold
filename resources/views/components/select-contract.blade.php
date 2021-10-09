<x-select-base name="{{$name}}"
               label="{{$label}}"
               select2=true
               {{ $attributes }}
               caption="Choose Contract"
>
            @foreach($options as $key => $data)
                <option value="{{ $data->id }}">{{ $data->sid }}.' * '. {{ $data->title }}</option>
            @endforeach
</x-select-base>
