@props([
    'type' => 'info'
])

<div {{ $attributes->class("alert alert-$type") }}>
    {{ $slot }}
</div>