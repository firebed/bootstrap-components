@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-outline-info' : 'btn-info']) }}>
    {{{ $slot }}}
</x-bs::button>
