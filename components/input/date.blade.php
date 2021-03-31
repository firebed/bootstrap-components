@props([
'error' => NULL,
'format' => 'DD/MM/YYYY'
])

<div
        class="input-group"
        x-data="{ value: @entangle($attributes->wire('model')), picker: undefined }"
        x-init="new Pikaday({ field: $refs.input, format: '{{ $format }}', onOpen() { this.setMoment(moment($refs.input.value, '{{ $format }}')) } })"
        x-on:change="value = $event.target.value"
        xmlns:x-on="http://www.w3.org/1999/xhtml" xmlns:x-bind="http://www.w3.org/1999/xhtml">
    <span class="input-group-text text-secondary bg-light"><em class="fa fa-calendar"></em></span>
    <input
            {{ $attributes->whereDoesntStartWith('wire:model') }}
            x-ref="input"
            x-bind:value="value"
            {{ $attributes->merge(['class' => 'form-control']) }}
            autocomplete="off"
    />
</div>
