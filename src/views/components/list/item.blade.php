@props(['active' => FALSE])

<div {{ $attributes->merge(['class' => 'list-group-item' . ($active ? ' active' : '')]) }} {{ $attributes }}>{{ $slot }}</div>
