@props([
    'id'
])

<input type="text" {{ $attributes->class('form-control') }} list="{{ $id }}-options" id="{{ $id }}">
<datalist id="{{ $id }}-options">
    {{ $slot }}
</datalist>