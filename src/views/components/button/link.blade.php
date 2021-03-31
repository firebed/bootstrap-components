@props([
    'size' => NULL,
    'type' => NULL
])

<button type="{{ $type ?? NULL }}" {{ $attributes->merge(['class' => "btn btn-link text-decoration-none" . ($size ? " btn-$size" : "") ]) }} {{ $attributes }}>
    {{{ $slot }}}
</button>
