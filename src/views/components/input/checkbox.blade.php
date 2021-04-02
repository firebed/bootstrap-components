@props(['disabled' => FALSE])

<div class="form-check mb-0">
    <input type="checkbox" {{ $attributes->merge(['class' => 'form-check-input']) }} autocomplete="off" @if($disabled) disabled @endif>
    <label for="{{ $attributes['id'] }}" class="form-check-label">{{ $slot }}</label>
</div>
