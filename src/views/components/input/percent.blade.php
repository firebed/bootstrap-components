@props([
    'error' => NULL,
    'min' => '-10000000000000',
    'max' => '10000000000000',
    'groupsSeparator' => config('intl.group_separator'),
    'decimalSeparator' => config('intl.decimal_separator'),
    'symbolPlacement' => config('intl.currency_placement'),
    'signPlacement' => config('intl.sign_placement'),
    'decimalPadding' => 'floats'
])

<input type="text"
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="
        new AutoNumeric($el, value, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $groupsSeparator }}',
            currencySymbol                : '%',
            currencySymbolPlacement       : '{{ $symbolPlacement }}',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            minimumValue                  : '{{ $min }}',
            maximumValue                  : '{{ $max }}',
            allowDecimalPadding           : '{{ $decimalPadding }}',
            rawValueDivisor               : 100,
        })
        $watch('value', v => document.activeElement !== $el ? AutoNumeric.set($el, v) : 0)
       "
       x-on:input="value = AutoNumeric.getNumber($el)"
        {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'form-control' . ($error && $errors->has($error) ? ' is-invalid' : '')]) }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif