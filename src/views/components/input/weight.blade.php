@props([
    'error' => NULL,
    'max' => '10000000000000',
    'decimalPlaces' => 0,
    'unit' => 'gr',
    'groupsSeparator' => config('intl.group_separator'),
    'decimalSeparator' => config('intl.decimal_separator'),
    'signPlacement' => config('intl.sign_placement')
])

<input type="text"
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="new AutoNumeric($el, value, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $groupsSeparator }}',
            currencySymbol                : '{{ "\u202f$unit" }}',
            currencySymbolPlacement       : 's',
            decimalPlaces                 : '{{ $decimalPlaces }}',
            maximumValue                  : '{{ $max }}',
            minimumValue                  : '0',
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