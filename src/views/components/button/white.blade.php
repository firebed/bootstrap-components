@props([
    'size' => NULL,
])

<button {{ $attributes->merge(['class' => "btn btn-white" . ($size ? " btn-$size" : "") ]) }} {{ $attributes }}>
    {{{ $slot }}}
</button>
