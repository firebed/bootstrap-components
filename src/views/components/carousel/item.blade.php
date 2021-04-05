@props(['active' => FALSE, 'interval' => NULL])

<div {{ $attributes->class(['carousel-item', 'active' => $active]) }} @isset($interval) data-bs-interval="{{ $interval }}" @endisset>
    {{ $slot }}
</div>
