<x-select-base name="{{$name}}"
               label="{{$label}}"
               select2=true
               {{ $attributes }}
               caption="Choose Employee"
>
            @foreach($options as $key => $data)
                <option value="{{ $data->id }}">{{ $data->name.'*'.$data->department_name }}</option>
            @endforeach
</x-select-base>
