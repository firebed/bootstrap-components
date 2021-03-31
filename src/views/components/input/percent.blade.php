@props([
    'error' => NULL,
    'digitGroupSeparator' => '.',
    'decimalCharacter' => ',',
    'decimalCharacterAlternative' => '.',
    'currencySymbolPlacement' => 's',
    'signPlacement' => 'p'
])

<input type="text"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="new AutoNumeric($el, {
            digitGroupSeparator           : '{{ $digitGroupSeparator }}',
            decimalCharacter              : '{{ $decimalCharacter }}',
            decimalCharacterAlternative   : '{{ $decimalCharacterAlternative }}',
            currencySymbol                : '\u202f%',
            currencySymbolPlacement       : '{{ $currencySymbolPlacement }}',
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