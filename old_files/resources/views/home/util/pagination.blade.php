<div class="services-pagination-wrapper main-pagination-wrapper">

    @if ($paginator->hasPages())
        <ul class="pagination">


            @foreach ($elements as $element)

                @if (is_string($element))
                        <li> <span aria-current="page" class="page-numbers current">{{ $element }}</span></li>
                @endif


                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                                <li> <span aria-current="page" class="page-numbers current">{{ $page }}</span></li>

                        @else
                            <li><a  class="next page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())

                <li><a  class="next page-numbers" href="#"> <i class="ti-angle-right"></i></a></li>

            @else
                    <li><a  class="next page-numbers" href="#"> <i class="ti-angle-left"></i></a></li>

            @endif
        </ul>
    @endif
</div>
