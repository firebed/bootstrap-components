@props([
    'label' => '',
    'inline' => false
])

<div {{ $attributes }}>
    @if($inline)
        <div class="row align-items-baseline">
            <div class="col-4">{{ $label }}</div>
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    @else
        <div class="small text-secondary">{{ $label }}</div>
        <div>{{ $slot }}</div>
    @endif
</div>
