<table {{ $attributes->merge(['class' => 'table mb-0']) }}>
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
