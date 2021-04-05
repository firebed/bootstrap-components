@props([
    'error' => NULL
])

<select {{ $attributes->class(['form-select', 'is-invalid' => $error && $errors->has($error)]) }}>
    {{ $slot }}
</select>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
