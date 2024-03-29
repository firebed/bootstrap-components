@if ($paginator->hasPages())
    <nav>
        <ul class="pagination mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="btn btn-sm btn-outline-light text-dark border-0 disabled" aria-hidden="true"><em class="fa fa-chevron-left small text-secondary"></em></span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-outline-light text-dark border-0" rel="prev" aria-label="@lang('pagination.previous')"><em class="fa fa-chevron-left small text-secondary"></em></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="btn btn-sm btn-outline-light text-dark border-0 disabled">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="btn btn-sm btn-outline-light text-dark border-0 text-primary fw-bold">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="btn btn-sm btn-outline-light text-dark border-0 shadow-none">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-outline-light text-dark border-0" rel="next" aria-label="@lang('pagination.next')">
                        <em class="fa fa-chevron-right small text-secondary"></em>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="btn btn-sm btn-outline-light text-dark border-0 disabled" aria-hidden="true"><em class="fa fa-chevron-right small text-secondary"></em></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
