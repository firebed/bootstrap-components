<table {{ $attributes->merge(['class' => 'table mb-0']) }}>
    <thead>
    <tr>
        {{ $head }}
    </tr>
    </thead>

    <tbody>
    {{ $slot }}
    </tbody>

    {{ $foot ?? '' }}
</table>
