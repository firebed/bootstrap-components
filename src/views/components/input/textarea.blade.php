@props([
    'error' => NULL
])

<textarea {{ $attributes->class(['form-control', 'is-invalid' => $error && $errors->has($error)]) }}>{{ $slot }}</textarea>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
