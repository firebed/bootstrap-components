@props([
    'alignment' => NULL,
    'theme' => NULL,
    'button'
])

<ul {{ $attributes->class(['dropdown-menu', "dropdown-menu-$theme" => $theme, 'dropdown-menu-end' => $alignment === 'right']) }} aria-labelledby="{{ $button }}">
    {{ $slot }}
</ul>
