@if ($paginator->hasPages())
<ul class="pagination">

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="disabled"><span>«</span></li>
    @else
        <li><a rel="prev" href="{{ $paginator->previousPageUrl() }}">«</a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a rel="next" href="{{ $paginator->nextPageUrl() }}">»</a></li>
    @else
        <li class="disabled"><span>»</span></li>
    @endif

</ul>
@endif