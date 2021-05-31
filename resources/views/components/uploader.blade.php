<div>
    @if ($label)
        <x-jet-label for="{{$name}}" value="{{ $label }}" />
    @endif

    <div
        x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
        <input id="$name"
               type="file"
               {!!  $attributes->merge(['class' => 'block rounded border-2 border-gray-200' ]) !!}
               {{ $attributes->whereStartsWith('wire:model') }}
        />

        <div x-show="isUploading">
               <progress max="100" x-bind:value="progress"></progress>
        </div>
    </div>
</div>
