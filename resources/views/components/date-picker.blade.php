<div>

    @if ($label)
        <x-jet-label for="{{$name}}" value="{{ $label }}" />
    @endif

    <table>
        <tbody>
            <tr>
                <td>
    <input
        x-data="{ value: @entangle($attributes->wire('model')), picker: undefined }"
        x-init="new Pikaday({ field: $refs.input,  onOpen() { this.setDate($refs.input.value) } })"
        x-on:change="value = $event.target.value"
        {!! $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'border-2 border-gray-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}
        x-ref="input"
        x-bind:value="value"
        id="$name"
    />
                </td>
                <td>
    <div class="px-3 py-2">
        <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor" width='24' height=24  >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
