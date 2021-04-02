@props([
    'outline' => false,
])

<x-bs::button {{ $attributes->merge(['class' => $outline ? 'btn-haze-danger' : 'btn-haze']) }}>
    {{{ $slot }}}
</x-bs::button>
