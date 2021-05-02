@props(['expand' => 'lg', 'theme' => 'light', 'fluid' => true])

<nav {{ $attributes->class(['navbar', "navbar-expand-$expand" => $expand, "navbar-$theme"]) }}>
    <div class="container{{ $fluid ? '-fluid' : '' }}">
        {{ $slot }}
    </div>
</nav>
