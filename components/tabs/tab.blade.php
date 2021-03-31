@props([
    'active' => FALSE,
    'target' => ''
])

<button class="nav-link @if($active) active @endif"
        {{ $attributes }}
        data-bs-toggle="tab"
        data-bs-target="#{{ $target }}"
        type="button"
        role="tab"
        aria-controls="{{ $target }}"
        @if($active) aria-selected="true" @endif
>
    {{ $slot }}
</button>
