@if ($paginator->hasPages())
    <div class="mt-5">
        <ul class="pagination justify-content-center">
            <nav>
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item active"><a class="page-link" href="#"
                                aria-label="&laquo; Previous">&lsaquo;</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                                aria-label="&laquo; Previous">&lsaquo;</a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item"><span class="page-link">{{ $element }}</span> </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active"><a class="page-link"
                                            href="#">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach


                    @if ($paginator->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                                aria-label="Next &raquo;">&rsaquo;</a></li>
                    @else
                        <li class="page-item active"><a class="page-link" href="#"
                                aria-label="Next &raquo;">&rsaquo;</a></li>
                    @endif
                </ul>
            </nav>
        </ul>
    </div>
@endif
