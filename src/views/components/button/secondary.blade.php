@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->class($outline ? 'btn-outline-secondary' : 'btn-secondary') }}>
    {{{ $slot }}}
</x-bs::button>
