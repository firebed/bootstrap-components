@props([
    'for',
    'label',
    'labelCol' => 4,
    'inline' => false
])

<div {{ $attributes }}>
    @if($inline)
        <div class="row align-items-baseline">
            <label for="{{ $for }}" class="{{ $labelCol }}">{{ $label }}</label>
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    @else
        <label for="{{ $for }}" class="form-label">{{ $label }}</label>
        {{ $slot }}
    @endif
</div>
