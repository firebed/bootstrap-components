@props([
    'error' => NULL,
    'labelClass' => '',
])

<div class="form-check mb-0">
    <input type="radio" {{ $attributes->class(['form-check-input', 'is-invalid' => $error && $errors->has($error)]) }} autocomplete="off">
    <label for="{{ $attributes->get('id') }}" class="form-check-label {{ $labelClass }}">{{ $slot }}</label>

    @if($error)
        @error($error)
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    @endif
</div>
