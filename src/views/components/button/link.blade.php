@props(['size' => NULL])

<button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'btn btn-link shadow-none text-decoration-none' . ($size ? " btn-$size" : ''),
        ]) }}
>
    {{ $slot }}
</button>