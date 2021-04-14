@props([
    'hover' => false,
    'striped' => false,
    'size' => '',
    'bordered' => false,
    'borderless' => false,
])

<table {{ $attributes->class([
    'table mb-0',
    'table-hover' => $hover,
    'table-striped' => $striped,
    'table-sm' => $size === 'sm',
    'table-bordered' => $bordered,
    'table-borderless' => $borderless,
]) }}>
    <thead>
    <tr>
        {{ $head }}
    </tr>
    </thead>

    <tbody>
    {{ $slot }}
    </tbody>

    @isset($foot)
        <tr>
            {{ $foot }}
        </tr>
    @endisset
</table>
