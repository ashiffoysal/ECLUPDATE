


@if ($paginator->hasPages())
<div class="styled-pagination-two">
        <ul class="clearfix">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            
                <a aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class='bx bx-chevron-left'></i>
                </a>
            @else
              
                <a href="{{ $paginator->previousPageUrl() }}"  rel="prev" aria-label="@lang('pagination.previous')">
                    <i class='bx bx-chevron-left'></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <a aria-disabled="true" >
                    {{ $element }}
                </a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            
                            <span class="" aria-current="page">{{ $page }}</span>
                      
                        @else
                        <a class="" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
             
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class='bx bx-chevron-right'></i></a>
               
            @else
               
                <a class="" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class='bx bx-chevron-right'></i>
                </a>
            @endif
        
</div>
@endif

       <!-- <div class="pagination-area">
                <a href="#" class="prev page-numbers">
                    <i class='bx bx-chevron-left'></i>
                </a>

                <a href="#" class="page-numbers">1</a>

                <span class="page-numbers current" aria-current="page">2</span>

                <a href="#" class="page-numbers">3</a>
                <a href="#" class="page-numbers">4</a>
                <a href="#" class="next page-numbers">
                    <i class='bx bx-chevron-right'></i>
                </a>
            </div> -->