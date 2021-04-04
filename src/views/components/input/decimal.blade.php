@props([
    'error' => NULL,
    'min' => '-10000000000000',
    'max' => '10000000000000',
    'decimalPlaces' => 2,
    'groupsSeparator' => config('intl.group_separator'),
    'decimalSeparator' => config('intl.decimal_separator'),
    'signPlacement' => config('intl.sign_placement')
])

<input type="text"
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="
        new AutoNumeric($el, value, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $groupsSeparator }}',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            decimalPlaces                 : '{{ $decimalPlaces }}',
            minimumValue                  : '{{ $min }}',
            maximumValue                  : '{{ $max }}',
            modifyValueOnWheel            : false
        })
        $watch('value', v => document.activeElement !== $el ? AutoNumeric.set($el, v) : 0)
       "
       x-on:input="value = AutoNumeric.getNumericString($el)"
        {{ $attributes->whereDoesntStartWith('wire:model')->class('form-control' . ($error && $errors->has($error) ? ' is-invalid' : '')) }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif