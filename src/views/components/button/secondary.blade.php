@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-outline-secondary' : 'btn-secondary']) }}>
    {{{ $slot }}}
</x-bs::button>
