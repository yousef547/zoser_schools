@if($paginator->hasPages())
<div class="row" style="display: block;">
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate " id="datatable-buttons_paginate">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                <li class="paginate_button disabled page-item previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                @else
                <li class="paginate_button page-item previous " id="datatable-buttons_previous"><a href="{{$paginator->previousPageUrl()}}" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                @endif
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    <!-- @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif -->

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="paginate_button page-item active"><a  aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="paginate_button page-item "><a href="{{ $url }}" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next" id="datatable-buttons_next"><a href="{{$paginator->nextPageUrl()}}" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                @else
                <li class="paginate_button disabled page-item next" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endif