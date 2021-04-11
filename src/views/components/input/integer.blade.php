@props([
    'min' => '-10000000000000',
    'max' => '10000000000000',
    'signPlacement' => config('intl.sign_placement')
])

<x-bs::input
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="
        new AutoNumeric($el, value, {
            digitGroupSeparator           : '',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            decimalPlaces                 : '0',
            minimumValue                  : '{{ $min }}',
            maximumValue                  : '{{ $max }}',
            modifyValueOnWheel            : false
        })
        $watch('value', v => document.activeElement !== $el ? AutoNumeric.set($el, v) : 0)"
        x-on:input="value = AutoNumeric.getNumericString($el)"
        {{ $attributes->whereDoesntStartWith('wire:model') }}/>