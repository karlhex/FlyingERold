<x-select-base name="{{$name}}"
               label="{{$label}}"
               select2=true
               {{ $attributes }}
               caption="Choose Product"
>
            @foreach($options as $key => $data)
                <option value="{{ $data->id }}">{{ $data->name }} * {{ $data->company_name }}</option>
            @endforeach
</x-select-base>
