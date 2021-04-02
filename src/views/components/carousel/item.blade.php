@props(['active' => FALSE, 'interval' => NULL])

<div {{ $attributes->merge(['class'  => "carousel-item" . ($active ? ' active' : '')]) }} @isset($interval) data-bs-interval="{{ $interval }}" @endisset>
    {{ $slot }}
</div>
