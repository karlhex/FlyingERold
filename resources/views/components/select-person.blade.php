@props(['label','name'])

<div>

    <x-jet-label for="{{$name}}" value="{{ $label }}" />
    <div wire:ignore>
        <select
            {{ $attributes->merge(['class' => 'select2 rounded' ]) }}
            {{ $attributes->whereStartsWith('wire:model') }}
        >
            <option value="">Choose Person</option>
            @foreach($people as $data)
            <option value="{{ $data['id'] }}">{{ $data['name'].' '.$data['company_name'].' '.$data['department'] }}</option>
            @endforeach
        </select>
    </div>

</div>

@push('scripts')

<script>
 $(document).ready(function () {
     $('.select2').select2();
     $('.select2').on('change', function (e) {
         var item = $('.select2').select2("val");
         @this.set($attributes->wire('model')->value(), item);
     });
 });

</script>

@endpush
