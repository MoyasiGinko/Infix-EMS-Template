@php
    // Global per-page selector partial
    $perPageKey = 'per_page';
    $default = isset($paginator) ? $paginator->perPage() : 10;
    $perPageCurrent = (int) request($perPageKey, $default);
    $perPageOptions = [10,50,100,250,500];
    if(!in_array($perPageCurrent,$perPageOptions)) { $perPageOptions[] = $perPageCurrent; sort($perPageOptions); }
    $query = request()->except('page');
@endphp
<form method="GET" class="form-inline mb-2 mb-md-0 d-flex align-items-center gap-2" style="gap:.5rem;">
    @foreach($query as $qk=>$qv)
        @if($qk !== 'per_page')
            <input type="hidden" name="{{ $qk }}" value="{{ $qv }}" />
        @endif
    @endforeach
    <label for="per_page_select" class="mb-0 small text-muted">Show</label>
    <select id="per_page_select" name="per_page" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()" style="min-width:90px;">
        @foreach($perPageOptions as $opt)
            <option value="{{ $opt }}" @selected($opt==$perPageCurrent)>{{ $opt }}</option>
        @endforeach
    </select>
    <span class="small text-muted">per page</span>
</form>
