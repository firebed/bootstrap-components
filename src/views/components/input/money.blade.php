@props([
    'error' => NULL,
    'min' => '0',
    'currency' => config('app.number_format.currency_symbol', '$'),
    'groupsSeparator' => config('app.number_format.group_separator', ','),
    'decimalSeparator' => config('app.number_format.decimal_separator', '.'),
    'currencyPlacement' => config('app.number_format.symbol_placement', 'p'),
    'signPlacement' => config('app.number_format.sign_placement', 'p')
])

<input type="text"
       autocomplete="off"
       x-data="{ value: @entangle($attributes->wire('model')) }"
       x-init="new AutoNumeric($el, {
            digitGroupSeparator           : '{{ $groupsSeparator }}',
            decimalCharacter              : '{{ $decimalSeparator }}',
            decimalCharacterAlternative   : '{{ $groupsSeparator }}',
            currencySymbol                : '{{ $currency }}',
            currencySymbolPlacement       : '{{ $currencyPlacement }}',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            minimumValue                  : '{{ $min }}',
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