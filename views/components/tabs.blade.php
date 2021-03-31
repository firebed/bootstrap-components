<nav>
    <div {{ $attributes->merge(['class' => 'nav nav-tabs']) }} {{ $attributes }} role="tablist">
        {{ $slot }}
    </div>
</nav>
