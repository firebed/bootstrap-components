@props([
    'sortable' => null,
    'direction' => null,
])

<td {{ $attributes->class(['sortable' => $sortable]) }}>
    @unless ($sortable)
        {{ $slot }}
    @else
        <a href="#" class="d-flex align-items-center shadow-none text-decoration-none text-dark group">
            @unless(Str::contains('text-end', $attributes->get('class')))
                <span class="me-2">{{ $slot }}</span>
            @endunless

            @if($direction === 'asc')
                <span class="text-secondary">
                    <x-bs::icons.chevron-up/>
                </span>
            @elseif($direction === 'desc')
                <span class="text-secondary">
                    <x-bs::icons.chevron-down/>
                </span>
            @else
                <span class="opacity-0 group-hover-opacity-100 text-secondary">
                    <x-bs::icons.chevron-up/>
                </span>
            @endif

            @if(Str::contains('text-end', $attributes->get('class')))
                <span class="ms-2">{{ $slot }}</span>
            @endif
        </a>
    @endunless
</td>
