@if ($paginator->hasPages())
{{--    <ul class="pagination justify-content-center">--}}
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
{{--            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>--}}
{{--            <p class="text-primary">&laquo;</p>--}}
        @else
{{--            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>--}}
            <p class="text-secondary"><a class="text-secondary text-decoration-none" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></p>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
{{--                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>--}}
                <p class="text-secondary">{{ $element }}</p>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
{{--                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>--}}
                        <p class="text-primary">{{ $page }}</p>
                    @else
{{--                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
                        <p class="text-secondary"><a class="text-secondary text-decoration-none" href="{{ $url }}">{{ $page }}</a></p>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
{{--            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>--}}
            <p class="text-secondary"><a class="page-link text-decoration-none" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></p>
        @else
{{--            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>--}}
            <p class="text-secondary disabled">&raquo;</p>
        @endif
{{--    </ul>--}}
@endif
