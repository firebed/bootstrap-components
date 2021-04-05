@props(['active' => FALSE])

<div {{ $attributes->class(['list-group-item', 'active' => $active]) }}>{{ $slot }}</div>
