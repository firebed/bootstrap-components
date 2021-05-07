@props([
    'error' => NULL,
    'lblClass' => NULL
])

<div class="form-check mb-0">
    <input type="checkbox" {{ $attributes->class(['form-check-input', 'is-invalid' => $error && $errors->has($error)]) }} autocomplete="off">
    <label for="{{ $attributes->get('id') }}" class="form-check-label @if($lblClass) {{ $lblClass }} @endif">{{ $slot }}</label>

    @if($error)
        @error($error)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>