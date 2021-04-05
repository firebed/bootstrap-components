@props([
    'for',
    'label'
])

<div {{ $attributes->class('form-floating') }}>
    {{ $slot }}
    <label for="{{ $for }}">{{ $label }}</label>
</div>