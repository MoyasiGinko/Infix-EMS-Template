@php
    $perPageKey = 'per_page';
    $perPageCurrent = (int) request($perPageKey, $paginator->perPage());
    $perPageOptions = [10,50,100,250,500];
    if(!in_array($perPageCurrent,$perPageOptions)) { $perPageOptions[] = $perPageCurrent; sort($perPageOptions); }
    $query = request()->except('page');
@endphp
@if ($paginator->hasPages())
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-2">
        <form method="GET" class="form-inline mb-2 mb-md-0">
            @foreach($query as $qk=>$qv)
                @if($qk !== 'per_page')
                    <input type="hidden" name="{{ $qk }}" value="{{ $qv }}" />
                @endif
            @endforeach
            <label class="mr-2 mb-0" for="per_page_select" style="font-weight:500;">Show</label>
            <select id="per_page_select" name="per_page" class="primary_select" onchange="this.form.submit()" style="min-width:100px;">
                @foreach($perPageOptions as $opt)
                    <option value="{{ $opt }}" @selected($opt==$perPageCurrent)>{{ $opt }}</option>
                @endforeach
            </select>
            <span class="ml-2">per page</span>
        </form>
        <div class="notification_pagination_container notification_list mt-2 mt-md-0">
        <ul class="d-flex justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="pagination_item disabled" aria-disabled="true">
                    <a class="" aria-hidden="true">
                        <i class="ti-arrow-left"></i>
                    </a>
                </li>
            @else
                <li class="pagination_item">
                    <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="ti-arrow-left"></i>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="pagination_item disabled" aria-disabled="true"><a href=""
                            class="">{{ $element }}</a></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination_item" aria-current="page"><a href=""
                                    class="current ">{{ $page }}</a></li>
                        @else
                            <li class="pagination_item"><a href="{{ $url }}"
                                    class="">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="pagination_item">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="ti-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="pagination_item disabled" aria-disabled="true">
                    <a class="" aria-hidden="true">
                        <i class="ti-arrow-right"></i>
                    </a>
                </li>
            @endif
            </ul>
        </div>
    </div>
@endif
