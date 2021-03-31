@props([
    'sortable' => null,
    'direction' => null,
])

<td @if($sortable) {{ $attributes->merge(['class' => $sortable ? 'sortable' : '']) }} @endif {{ $attributes }}>
    @unless ($sortable)
        {{ $slot }}
    @else
        <a href="#" class="d-flex align-items-center shadow-none text-decoration-none text-dark">
            <span class="me-2">{{ $slot }}</span>
            @if ($direction === 'asc')
                <svg class="text-secondary" style="width: .75rem; height: .75rem" fill="none" stroke="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 5l6 6 6-6"></path>
                </svg>
            @elseif ($direction === 'desc')
                <svg class="text-secondary" style="width: .75rem; height: .75rem" fill="none" stroke="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 11l6 -6 6 6"></path>
                </svg>
            @else
                <svg class="opacity-0 text-secondary" style="width: .75rem; height: .75rem" fill="none" stroke="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 11l6 -6 6 6"></path>
                </svg>
            @endif
        </a>
    @endunless
</td>
