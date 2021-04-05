@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->class($outline ? 'btn-outline-light' : 'btn-light') }}>
    {{{ $slot }}}
</x-bs::button>
