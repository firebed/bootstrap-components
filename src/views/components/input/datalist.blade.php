@props([
    'id'
])

<x-bs::input {{ $attributes }} list="{{ $id }}-options" id="{{ $id }}"/>
<datalist id="{{ $id }}-options">
    {{ $slot }}
</datalist>