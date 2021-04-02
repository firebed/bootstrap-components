@props(['active' => FALSE])

<a {{ $attributes->merge(['class' => 'list-group-item list-group-item-action' . ($active ? ' active' : '')]) }}>{{ $slot }}</a>
