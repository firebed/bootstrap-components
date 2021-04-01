@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-outline-warning' : 'btn-warning']) }}>
    {{{ $slot }}}
</x-bs::button>
