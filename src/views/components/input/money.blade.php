@props([
    'min' => '0',
    'max' => '10000000000000',
    'currency' => config('intl.currency'),
    'groupsSeparator' => config('intl.group_separator'),
    'decimalSeparator' => config('intl.decimal_separator'),
    'currencyPlacement' => config('intl.currency_placement'),
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
            currencySymbol                : '{{ $currency }}',
            currencySymbolPlacement       : '{{ $currencyPlacement }}',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            minimumValue                  : '{{ $min }}',
            maximumValue                  : '{{ $max }}',
            modifyValueOnWheel            : false
        })
        $watch('value', v => document.activeElement !== $el ? AutoNumeric.set($el, v) : 0)"
        x-on:input="value = AutoNumeric.getNumericString($el)"
        {{ $attributes->whereDoesntStartWith('wire:model') }}/>