@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-outline-danger' : 'btn-danger']) }}>
    {{{ $slot }}}
</x-bs::button>
