@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-outline-primary' : 'btn-primary']) }}>
    {{{ $slot }}}
</x-bs::button>
