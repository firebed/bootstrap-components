@props([
    'size' => NULL,
])

<button {{ $attributes->merge(['class' => "btn btn-danger" . ($size ? " btn-$size" : "") ]) }} {{ $attributes }}>
    {{{ $slot }}}
</button>
