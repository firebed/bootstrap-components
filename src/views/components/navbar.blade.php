@props(['expand' => 'lg', 'theme' => 'light'])

<nav {{ $attributes->class(['navbar', "navbar-expand-$expand" => $expand, "navbar-$theme"]) }}>
    <div class="container-fluid">
        {{ $slot }}
    </div>
</nav>
