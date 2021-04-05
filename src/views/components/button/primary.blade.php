@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->class($outline ? 'btn-outline-primary' : 'btn-primary') }}>
    {{{ $slot }}}
</x-bs::button>
