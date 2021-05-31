@props(['label','name'])

<div>
    @if ($label)
        <x-jet-label for="{{$name}}" value="{{ $label }}" />
    @endif
    <x-jet-input id="{{$name}}" type="text" {{ $attributes }} />
    <x-jet-input-error for="{{$name}}" class="mt-2" />
</div>
