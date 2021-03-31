@props([
    'disabled' => FALSE,
    'type' => 'link',
    'href' => '#',
])

<li>
    @if($type === 'button')
        <button {{ $attributes->merge(['class' => 'dropdown-item']) }} type="button" @if($disabled) disabled @endif {{ $attributes }}>{{ $slot }}</button>
    @else
        <a {{ $attributes->merge(['class' => 'dropdown-item' . ($disabled ? ' disabled' : '')]) }} href="{{ $href }}" {{ $attributes }}>{{ $slot }}</a>
    @endif
</li>
