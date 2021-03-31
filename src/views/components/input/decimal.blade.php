@props([
    'error' => NULL,
    'minValue' => '-10000000000000',
    'decimalPlaces' => 2,
    'groupsSeparator' => config('app.number_format.group_separator', ','),
    'decimalSeparator' => config('app.number_format.decimal_separator', '.'),
    'signPlacement' => config('app.number_format.sign_placement', 'p')
])

<input type="text"
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="new AutoNumeric($el, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $groupsSeparator }}',
            currencySymbol                : '{{ $currencySymbol }}',
            currencySymbolPlacement       : '{{ $symbolPlacement }}',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            decimalPlaces                 : '{{ $decimalPlaces }}',
            minimumValue                  : '{{ $minValue }}',
            watchExternalChanges          : true,
            showWarnings                  : false
       })"
       x-on:input="value = AutoNumeric.getNumber($el)"
        {{ $attributes->whereDoesntStartWith('wire:model')->merge(['class' => 'form-control' . ($error && $errors->has($error) ? ' is-invalid' : '')]) }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif