@props([
    'sortable' => null,
    'direction' => null,
])

<td {{ $attributes->class([$sortable ? 'sortable' : '']) }}>
    @unless ($sortable)
        {{ $slot }}
    @else
        <a href="#" class="d-flex align-items-center shadow-none text-decoration-none text-dark">
            <span class="me-2">{{ $slot }}</span>
            @if ($direction === 'desc')
                <x-bs::icons.chevron-down/>
            @else
                <x-bs::icons.chevron-up/>
            @endif
        </a>
    @endunless
</td>