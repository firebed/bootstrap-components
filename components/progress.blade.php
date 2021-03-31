@props([
    'value' => 0,
    'min' => 0,
    'max' => 100,
    'height' => null
])
<div class="progress" @if($height) style="height: {{ $height }}" @endif>
    <div class="progress-bar" role="progressbar" style="width: {{ $value }}%" aria-valuenow="{{ $value }}" aria-valuemin="{{ $min }}" aria-valuemax="{{ $max }}">
        {{ $slot }}
    </div>
</div>
