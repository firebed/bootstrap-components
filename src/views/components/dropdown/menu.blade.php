@props([
    'alignment' => NULL,
    'theme' => NULL,
    'button'
])

<ul
        {{ $attributes->merge(['class' => 'dropdown-menu' . ($theme ? " dropdown-menu-$theme" : '') . ($alignment === 'right' ? ' dropdown-menu-end' : '')]) }}
        {{ $attributes }}
        aria-labelledby="{{ $button }}">

    {{ $slot }}
</ul>
