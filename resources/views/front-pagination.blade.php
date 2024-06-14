@if ($paginator->hasPages())
<!-- Start Filter Bar -->
<div class="filter-bar d-flex flex-wrap align-items-center">
{{--    <div class="sorting mr-auto">--}}
{{--        <select>--}}
{{--            <option value="1">Show 12</option>--}}
{{--            <option value="1">Show 12</option>--}}
{{--            <option value="1">Show 12</option>--}}
{{--        </select>--}}
{{--    </div>--}}
    <div class="pagination float-right">
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" class="prev-arrow disabled"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        <a href="#" class="active">1</a>
        <a href="#">2</a>

            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active" aria-current="page">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        @endif
    </div>
</div>
@endif
