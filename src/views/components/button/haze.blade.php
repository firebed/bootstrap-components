@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->class($outline ? 'btn-outline-haze' : 'btn-haze') }}>
    {{{ $slot }}}
</x-bs::button>
