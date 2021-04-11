@props([
    'max' => '10000000000000',
    'decimalPlaces' => 0,
    'unit' => 'gr',
    'groupsSeparator' => config('intl.group_separator'),
    'decimalSeparator' => config('intl.decimal_separator'),
    'signPlacement' => config('intl.sign_placement')
])

<x-bs::input
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="
        new AutoNumeric($el, value, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $groupsSeparator }}',
            currencySymbol                : '{{ "\u202f$unit" }}',
            currencySymbolPlacement       : 's',
            decimalPlaces                 : '{{ $decimalPlaces }}',
            maximumValue                  : '{{ $max }}',
            minimumValue                  : '0',
            modifyValueOnWheel            : false
        })
        $watch('value', v => document.activeElement !== $el ? AutoNumeric.set($el, v) : 0)"
        x-on:input="value = AutoNumeric.getNumericString($el)"
        {{ $attributes->whereDoesntStartWith('wire:model') }}/>