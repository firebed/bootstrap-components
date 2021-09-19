@props([
    'error' => NULL,
    'min' => '0',
    'max' => '10000000000000',
    'currencySymbol' => config('eshop.currency_symbol'),
    'groupsSeparator' => config('eshop.group_separator'),
    'decimalSeparator' => config('eshop.decimal_separator'),
    'currencyPlacement' => config('eshop.currency_placement'),
    'signPlacement' => config('eshop.sign_placement'),
    'emptyInputBehavior' => 'null'
])

<input type="text"
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="
        new AutoNumeric($el, value, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $groupsSeparator }}',
            currencySymbol                : '{{ $currencySymbol }}',
            currencySymbolPlacement       : '{{ $currencyPlacement }}',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            minimumValue                  : '{{ $min }}',
            maximumValue                  : '{{ $max }}',
            modifyValueOnWheel            : false,
            emptyInputBehavior            : '{{ $emptyInputBehavior }}'
        })
        $watch('value', v => document.activeElement !== $el ? $nextTick(() => AutoNumeric.set($el, v)) : 0)
        $el.addEventListener('autoNumeric:rawValueModified', evt => value = evt.detail.newRawValue)"
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-control', 'is-invalid' => $error && $errors->has($error)]) }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif