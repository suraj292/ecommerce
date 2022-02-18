<div class="product-pagination">
    @if ($paginator->hasPages())
    <div class="theme-paggination-block">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-8 col-md-8 col-sm-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            <li class="page-item">
                                @if ($paginator->onFirstPage())
                                    <a class="page-link" disabled aria-label="Previous">
                                        <span aria-hidden="true">
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                @else
                                    <a class="page-link" type="button" aria-label="Previous" wire:click="previousPage" >
                                        <span aria-hidden="true">
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                @endif
                            </li>

                            @foreach ($elements as $element)
{{--                            <li class="page-item active">--}}
{{--                                <a class="page-link" href="#">1</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#">2</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#">3</a>--}}
{{--                            </li>--}}
                                @if (is_string($element))
                                    <li class="page-item">
                                        <a class="page-link">{{ $element }}</a>
                                    </li>
                                @endif
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <li class="page-item active" wire:click="gotoPage({{ $page }})">
                                                <a class="page-link">{{ $page }}</a>
                                            </li>
                                        @else
                                            <li class="page-item" wire:click="gotoPage({{ $page }})">
                                                <a class="page-link" type="button">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif

                            @endforeach

                            <li class="page-item">
                                @if ($paginator->hasMorePages())
                                    <a class="page-link" type="button" aria-label="Next" wire:click="nextPage" >
                                        <span class="sr-only">Next</span>
                                        <span aria-hidden="true">
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                @else
                                    <a class="page-link" disabled aria-label="Next">
                                        <span class="sr-only">Next</span>
                                        <span aria-hidden="true">
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                @endif
                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-12">
                    <div class="product-search-count-bottom">
                        <h5>Showing Products {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }} Result</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

