@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-outline-success' : 'btn-success']) }}>
    {{{ $slot }}}
</x-bs::button>
