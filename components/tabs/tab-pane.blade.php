@props([
    'active' => FALSE
])

<div class="tab-pane @if($active) show active @endif" {{ $attributes }} role="tabpanel" aria-labelledby="{{ $attributes->get('id') }}">
    {{ $slot }}
</div>
