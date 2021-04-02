<nav>
    <div {{ $attributes->merge(['class' => 'nav nav-tabs']) }} role="tablist">
        {{ $slot }}
    </div>
</nav>
