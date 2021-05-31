<div>
    @if ($label)
        <x-jet-label for="{{$name}}" value="{{ $label }}" />
    @endif

    <select id="{{$name}}"
        {{ $attributes->merge(['class' => 'form-control rounded' ]) }}
        {{ $attributes->whereStartsWith('wire:model') }}
    >
        @foreach ($options as $option)
            <option value="{{$option->option}}"> {{$option->value}}</option>
        @endforeach
    </select>
</div>
