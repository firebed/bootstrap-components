@props([
    'size' => NULL,
])

<button {{ $attributes->merge(['class' => "btn btn-primary" . ($size ? " btn-$size" : "") ]) }} {{ $attributes }}>
    {{{ $slot }}}
</button>
