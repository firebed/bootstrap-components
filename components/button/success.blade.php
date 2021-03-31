@props([
    'size' => NULL,
])

<button {{ $attributes->merge(['class' => "btn btn-success" . ($size ? " btn-$size" : "") ]) }} {{ $attributes }}>
    {{{ $slot }}}
</button>
