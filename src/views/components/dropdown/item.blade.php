@props([
    'disabled' => FALSE,
    'type' => 'link',
    'href' => '#',
])

<li>
    @if($type === 'button')
        <button {{ $attributes->merge(['class' => 'dropdown-item']) }} type="button" @if($disabled) disabled @endif {{ $attributes }}>{{ $slot }}</button>
    @elseif ($type === 'link')
        <a {{ $attributes->merge(['class' => 'dropdown-item']) }} href="{{ $href }}" {{ $attributes }}>{{ $slot }}</a>
    @else
        {{ $slot }}
    @endif
</li>
