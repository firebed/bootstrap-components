@props([
    'for',
    'label',
    'inline' => false
])

<div {{ $attributes }}>
    @if($inline)
        <div class="row align-items-center">
            <label for="{{ $for }}" class="col-4">{{ $label }}</label>
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    @else
        <label for="{{ $for }}" class="form-label">{{ $label }}</label>
        {{ $slot }}
    @endif
</div>
