@props([
    'error' => NULL,
    'accept' => NULL
])

<input type="file" {{ $attributes->class(['form-control', 'is-invalid' => $error && $errors->has($error)]) }} @if($accept) accept="{{ $accept }}" @endif>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
