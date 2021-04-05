@props(['active' => FALSE])

<li class="nav-item">
    <a {{ $attributes->class(['nav-link', 'active' => $active]) }}>{{ $slot }}</a>
</li>
