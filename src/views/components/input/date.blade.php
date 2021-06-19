@props([
    'error' => NULL,
    'firstDay' => 1,
    'format' => 'DD/MM/YYYY'
])

<input
        @if($attributes->wire('model')->value)
            x-data="{ value: @entangle($attributes->wire('model'))}"
            x-on:change="value = $event.target.value"
            x-bind:value="value"
        @else
            x-data
        @endif
        x-init="new Pikaday({
            field: $el,
            firstDay: {{ $firstDay }},
            format: '{{ $format }}',
            onOpen() { this.setMoment(moment($el.value, '{{ $format }}')) }
        })"
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-control', 'is-invalid' => $error && $errors->has($error)]) }}
        autocomplete="off"
/>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
