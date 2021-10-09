@props(['label','name'])

<x-edit-base name="{{$name}}"
             label="{{$label}}"
             {{ $attributes  }}
>

    <input type='text'
           name="{{$name}}"
           id="{{$name}}"
           {{ $attributes->merge(['class' => 'my-2 px-3 py-1 border rounded text-xs text-gray-700 focus:outline-none' ]) }}
    />
</x-edit-base>
