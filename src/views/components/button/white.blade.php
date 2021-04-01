@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => ($outline ? 'btn-outline-white' : 'btn-white') . ($attributes->has('disabled') ? ' bg-gray-100' : '')]) }}>
    {{{ $slot }}}
</x-bs::button>
