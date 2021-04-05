@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->class($outline ? 'btn-outline-dark' : 'btn-dark') }}>
    {{{ $slot }}}
</x-bs::button>
