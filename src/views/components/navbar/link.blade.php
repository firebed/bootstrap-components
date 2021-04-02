@props(['active' => FALSE])

<li class="nav-item">
    <a {{ $attributes->merge(['class' => 'nav-link' . ($active ? ' active' : '')]) }}>{{ $slot }}</a>
</li>
