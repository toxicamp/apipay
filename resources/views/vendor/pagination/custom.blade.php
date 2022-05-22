@if ($paginator->hasPages())

    <ul class="pagination">


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__item active" aria-current="page">
                                <span class="pagination__link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination__item btn-hover3"><a class="pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


        </ul>

@endif
