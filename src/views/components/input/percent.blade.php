@props([
    'error' => NULL
])

<input type="text"
       x-data
       x-init="new AutoNumeric($el, AutoNumericOptions.percentPos)"
       x-on:change="$dispatch('input', AutoNumeric.getNumber($el))"
        {{ $attributes->merge(['class' => 'form-control' . ($error && $errors->has($error) ? ' is-invalid' : '')]) }}
        {{ $attributes }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif