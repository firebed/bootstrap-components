@props([
    'placeholder' => NULL,
    'error'       => NULL
])

<select {{ $attributes->merge(['class' => 'form-select' . ($error && $errors->has($error) ? ' is-invalid' : '')]) }}>
    @if ($placeholder)
        <option disabled value="">{{ $placeholder }}</option>
    @endif

    {{ $slot }}
</select>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
