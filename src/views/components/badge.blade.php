@props([
    'type' => NULL
])

@php
    $type = $type ?? "primary";

    $color = match($type) {
        'secondary' => 'bg-gray-200',
        'success'   => 'bg-teal-200',
        'info'      => 'bg-cyan-200',
        'warning'   => 'bg-yellow-200',
        'danger'    => 'bg-red-200',
        default     => 'bg-blue-200'
    }
@endphp

<span {{ $attributes->class("badge $color rounded-pill") }}>{{ $slot }}</span>
