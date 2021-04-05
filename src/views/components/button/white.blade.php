@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->class($outline ? 'btn-outline-white' : 'btn-white') }}>
    {{{ $slot }}}
</x-bs::button>
