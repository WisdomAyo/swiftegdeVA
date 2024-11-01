
<div class="pagination-area">
    @if ($paginator->hasPages())
        <ul class="pagination">

            @if ($paginator->onFirstPage())
                <a href="#" class="prev page-numbers">
                    <i class='bx bx-chevron-left'></i>
                </a>
            @else
                {{-- <a href="{{ $paginator->previousPageUrl() }}" class="page-numbers">1</a>
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li> --}}
            @endif



            @foreach ($elements as $element)

                @if (is_string($element))
                    <span class="page-numbers current" aria-current="page">{{ $element }}</span>
                    {{-- <li class="disabled"><span>{{ $element }}</span></li> --}}
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-numbers current" aria-current="page">{{ $page }}</span>

                        @else
                            <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>

                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())

                <a href="#" class="next page-numbers">
                    <i class='bx bx-chevron-right'></i>
                </a>

            @else
                <a href="#" class="prev page-numbers">
                    <i class='bx bx-chevron-left'></i>
                </a>

            @endif
        </ul>
    @endif
</div>
