@props([
    'active' => FALSE,
    'disabled' => FALSE
])

<a {{ $attributes->class(['list-group-item', 'list-group-item-action', 'active' => $active]) }} @if($disabled) tabindex="-1" aria-disabled="true" @endif>
    {{ $slot }}
</a>
