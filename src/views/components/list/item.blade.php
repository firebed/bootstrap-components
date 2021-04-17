@props([
    'active' => FALSE,
    'disabled' => FALSE
])

<div {{ $attributes->class(['list-group-item', 'active' => $active]) }}  @if($disabled) tabindex="-1" aria-disabled="true" @endif>
    {{ $slot }}
</div>
