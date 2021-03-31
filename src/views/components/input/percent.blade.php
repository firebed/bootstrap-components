@props([
    'error' => NULL,
    'groupsSeparator' => config('app.number_format.group_separator', ','),
    'decimalSeparator' => config('app.number_format.decimal_separator', '.'),
    'symbolPlacement' => config('app.number_format.symbol_placement', 'p'),
    'signPlacement' => config('app.number_format.sign_placement', 'p')
])

<input type="text"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="new AutoNumeric($el, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $digit }}',
            currencySymbol                : '\u202f%',
            currencySymbolPlacement       : '{{ $symbolPlacement }}',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            rawValueDivisor               : 100,
            watchExternalChanges          : true,
            showWarnings                  : false
       })"
       x-on:change="value = AutoNumeric.getNumber($el)"
        {{ $attributes->merge(['class' => 'form-control' . ($error && $errors->has($error) ? ' is-invalid' : '')]) }}
        {{ $attributes->whereDoesntStartWith('wire:model') }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif