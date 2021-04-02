@props(['size' => NULL])

<button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'btn btn-link text-decoration-none' . ($size ? " btn-$size" : ''),
        ]) }}
>
    {{ $slot }}
</button>