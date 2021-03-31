@props([
    'size' => NULL,
])

<button {{ $attributes->merge(['class' => "btn btn-link p-0 text-decoration-none" . ($size ? " btn-$size" : "") ]) }} {{ $attributes }}>
    {{{ $slot }}}
</button>
