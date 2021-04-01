@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-outline-light' : 'btn-light']) }}>
    {{{ $slot }}}
</x-bs::button>
