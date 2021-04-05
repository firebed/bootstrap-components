@props([
    'active' => FALSE
])

<div {{ $attributes->class(['tab-pane', 'show active' => $active]) }} role="tabpanel" aria-labelledby="{{ $attributes->get('id') }}">
    {{ $slot }}
</div>
