@props([
    'error' => NULL,
    'accept' => 'image/*'
])

<input type="file" {{ $attributes->class(['form-control', 'is-invalid' => $error && $errors->has($error)]) }} accept="{{ $accept }}">

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
