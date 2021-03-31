@props([
    'size' => NULL,
])

<button {{ $attributes->merge(['class' => "btn btn-secondary" . ($size ? " btn-$size" : "") ]) }} {{ $attributes }}>
    {{{ $slot }}}
</button>
