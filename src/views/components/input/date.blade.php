@props([
    'error' => NULL,
    'format' => 'DD/MM/YYYY'
])

<input
        x-data="{ value: @entangle($attributes->wire('model'))}"
        x-init="new Pikaday({ field: $el, format: '{{ $format }}', onOpen() { this.setMoment(moment($el.value, '{{ $format }}')) } })"
        x-on:change="value = $event.target.value"
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-control', 'is-invalid' => $error && $errors->has($error)]) }}
        x-bind:value="value"
        autocomplete="off"
/>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
