@props([
    'active' => FALSE,
    'target' => ''
])

<button {{ $attributes->class(['nav-link', 'active' => $active]) }}
        data-bs-toggle="tab"
        data-bs-target="#{{ $target }}"
        type="button"
        role="tab"
        aria-controls="{{ $target }}"
        @if($active) aria-selected="true" @endif
>
    {{ $slot }}
</button>
