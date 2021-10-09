<x-select-base name="{{$name}}"
               label="{{$label}}"
               select2=true
               {{ $attributes }}
               caption="Choose Project"
>
            @foreach($options as $key => $data)
                <option value="{{ $data->id }}">{{ $data->sid }} | {{ $data->name }}</option>
            @endforeach
</x-select-base>
