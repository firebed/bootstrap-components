@props([
    'error' => NULL,
    'min' => '-10000000000000',
    'max' => '10000000000000',
    'signPlacement' => config('intl.sign_placement'),
    'emptyInputBehavior' => 'null'
])

<input type="text"
       autocomplete="off"
       @if($attributes->wire('model')->value)
        x-data="{ value: @entangle($attributes->wire('model')) }"
       @else
        x-data="{ value: '' }"
       @endif
       x-init="
        new AutoNumeric($el, value, {
            digitGroupSeparator           : '',
            negativePositiveSignPlacement : '{{ $signPlacement }}',
            decimalPlaces                 : '0',
            minimumValue                  : '{{ $min }}',
            maximumValue                  : '{{ $max }}',
            modifyValueOnWheel            : false,
            emptyInputBehavior            : '{{ $emptyInputBehavior }}'
        })
        $watch('value', v => document.activeElement !== $el ? $nextTick(() => AutoNumeric.set($el, v)) : 0)"
       x-on:input="value = AutoNumeric.getNumericString($el)"
        {{ $attributes->whereDoesntStartWith('wire:model')->class(['form-control', 'is-invalid' => $error && $errors->has($error)]) }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
