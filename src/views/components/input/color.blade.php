@props([
    'error' => NULL
])

<input type="color" {{ $attributes->class(['form-control', 'form-control-color', 'is-invalid' => $error && $errors->has($error)]) }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
