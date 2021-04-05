@props([
    'disabled' => FALSE,
    'type' => 'link',
    'href' => '#',
])

<li>
    @if($type === 'button')
        <button {{ $attributes->class('dropdown-item') }} type="button">{{ $slot }}</button>
    @else
        <a {{ $attributes->class(['dropdown-item', 'disabled' => $disabled]) }} href="{{ $href }}">{{ $slot }}</a>
    @endif
</li>
