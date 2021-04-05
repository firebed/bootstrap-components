@props(['active' => FALSE])

<a {{ $attributes->class(['list-group-item', 'list-group-item-action', 'active' => $active]) }}>{{ $slot }}</a>
