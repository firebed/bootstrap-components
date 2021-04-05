@props([
    'error' => NULL,
    'disabled' => FALSE
])

<div class="form-check form-switch">
    <input type="checkbox" {{ $attributes->class(['form-check-input', 'is-invalid' => $error && $errors->has($error)]) }} autocomplete="off" @if($disabled) disabled @endif>
    <label for="{{ $attributes->get('id') }}" class="form-check-label">{{ $slot }}</label>

    @if($error)
        @error($error)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>