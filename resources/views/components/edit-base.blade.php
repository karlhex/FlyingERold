@props(['label','name'])

<div>
    @if ($label)
        <x-jet-label for="{{$name}}" value="{{ $label }}" />
    @endif

    {{ $slot }}

    <x-jet-input-error for="{{$name}}" class="mt-2" />
</div>
