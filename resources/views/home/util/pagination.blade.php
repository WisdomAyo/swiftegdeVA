



    
    <nav class="pt-3 mt-3 mt-lg-4 mb-2 mb-sm-3 mb-md-4 mb-lg-5" aria-label="Listings pagination">
        @if ($paginator->hasPages())
        <ul class="pagination pagination-lg justify-content-center">
            @foreach ($elements as $element)
            @if (is_string($element))
          <li class="page-item active" aria-current="page">
            <span class="page-link">
                {{ $element }}
              <span class="visually-hidden">(current)</span>
            </span>
          </li>
          @endif

          @if (is_array($element))
          @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
          
          <li class="page-item">
            <a class="page-link active" aria-current="page" href="#!">{{ $page }}</a>
          </li>
          @else
          <li class="page-item">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
          </li>
          @endif
          @endforeach
          @endif
          @endforeach

          @if ($paginator->hasMorePages())
          <li class="page-item">
            <a class="page-link" href="#!"><i class="fi-angle-right"></i></a>
          </li>
          @else
          <li class="page-item">
            <a class="page-link" href="#!"><i class="fi-angle-right"></i></a>
          </li>
          @endif
         
        </ul>
        @endif
      </nav>
     



