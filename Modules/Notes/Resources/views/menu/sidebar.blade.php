{{-- Notes Module Start --}}
@if(auth()->user()->role_id == 1)
    <li data-position="999" class="sortable_li">
        <a href="{{ route('notes.index') }}">
            <div class="nav_icon_small">
                <span class="fas fa-sticky-note"></span>
            </div>
            <div class="nav_title">
                <span>Notes</span>
            </div>
        </a>
    </li>
@endif
{{-- Notes Module End --}}
