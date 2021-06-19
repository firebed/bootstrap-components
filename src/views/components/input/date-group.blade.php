@props([
    'error' => NULL,
    'firstDay' => 1,
    'format' => 'DD/MM/YYYY'
])

<div
        class="input-group"

        @if($attributes->wire('model')->value)
            x-data="{ value: @entangle($attributes->wire('model')) }"
            x-on:change="value = $event.target.value"
            x-bind:value="value"
        @else
            x-data
        @endif

        x-init="new Pikaday({
            field: $refs.input,
            firstDay: {{ $firstDay }},
            format: '{{ $format }}',
            onOpen() { this.setMoment(moment($refs.input.value, '{{ $format }}')) }
        })"
>
    <span class="input-group-text text-secondary bg-light"><em class="fa fa-calendar"></em></span>
    <input
            {{ $attributes->whereDoesntStartWith('wire:model')->class('form-control') }}
            x-ref="input"
            @if($attributes->wire('model')->value)
                x-bind:value="value"
            @endif
            autocomplete="off"
    />
</div>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
