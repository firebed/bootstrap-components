@props(['size' => NULL])

<button
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'btn shadow-sm' . ($size ? " btn-$size" : ''),
        ]) }}
>
    {{ $slot }}
</button>
